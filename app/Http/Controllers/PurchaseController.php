<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\PurchaseMaster;
use App\Models\PurchaseDetails;
use Validator;
use Toastr;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = PurchaseMaster::with('supplier')->get();
        return view('purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $units = Unit::all();

        return view('purchase.create', compact('suppliers', 'products', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'product_id.*' => 'required|exists:products,id',
            'unit_id.*' => 'required|exists:units,id',
            'purchase_price.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $purchaseMaster = new PurchaseMaster();
        $purchaseMaster->supplier_id = $request->supplier_id;
        $purchaseMaster->purchase_date = $request->purchase_date;
        $purchaseMaster->total_quantity = array_sum($request->quantity);
        $purchaseMaster->total_amount = array_sum(array_map(function ($quantity, $price) {
            return $quantity * $price;
        }, $request->quantity, $request->purchase_price));
        $purchaseMaster->created_by = auth()->id();
        $purchaseMaster->save();

        foreach ($request->product_id as $index => $productId) {
            $details = new PurchaseDetails();
            $details->purchase_master_id = $purchaseMaster->id;
            $details->product_id = $productId;
            $details->unit_id = $request->unit_id[$index];
            $details->purchase_price = $request->purchase_price[$index];
            $details->quantity = $request->quantity[$index];
            $details->total = $details->purchase_price * $details->quantity;
            $details->save();
        }

        Toastr::success('Success', 'Purchase created successfully!');
        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $purchase = PurchaseMaster::with(['details.product', 'details.unit', 'supplier'])->findOrFail($id);
        return view('purchase.show', compact('purchase'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [

            'purchase' => PurchaseMaster::with('details')->findOrFail($id),
            'purchaseDetails' => PurchaseDetails::where('purchase_master_id', $id)->get(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'units' => Unit::all(),
        ];

        return view('purchase.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'product_id.*' => 'required|exists:products,id',
            'unit_id.*' => 'required|exists:units,id',
            'purchase_price.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        // Update PurchaseMaster
        $purchase = PurchaseMaster::findOrFail($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_quantity = array_sum($request->quantity);
        $purchase->total_amount = array_sum(array_map(
            fn($quantity, $price) => $quantity * $price,
            $request->quantity,
            $request->purchase_price
        ));
        $purchase->save();

        // Update or create PurchaseDetails
        foreach ($request->product_id as $index => $productId) {
            $detailData = [
                'purchase_master_id' => $purchase->id,
                'product_id' => $productId,
                'unit_id' => $request->unit_id[$index],
                'purchase_price' => $request->purchase_price[$index],
                'quantity' => $request->quantity[$index],
                'total' => $request->quantity[$index] * $request->purchase_price[$index],
            ];

            // Check if detail exists, update if it does, create otherwise
            $detailId = $request->detail_id[$index] ?? null;
            if ($detailId) {
                $detail = PurchaseDetails::findOrFail($detailId);
                $detail->update($detailData);
            } else {
                PurchaseDetails::create($detailData);
            }
        }

        // Optionally delete removed details
        $existingDetailIds = $purchase->details->pluck('id')->toArray();
        $submittedDetailIds = $request->detail_id ?? [];
        $detailsToDelete = array_diff($existingDetailIds, $submittedDetailIds);
        PurchaseDetails::whereIn('id', $detailsToDelete)->delete();

        Toastr::success('Purchase updated successfully!', 'Success');
        return redirect()->route('purchases.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $purchaseMaster = PurchaseMaster::findOrFail($id);
        $purchaseMaster->details()->delete();
        $purchaseMaster->delete();

        Toastr::success('Success', 'Purchase deleted successfully!');
        return redirect()->route('purchases.index');
    }
}
