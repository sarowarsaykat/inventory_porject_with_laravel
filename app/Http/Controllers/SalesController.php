<?php

namespace App\Http\Controllers;

use App\Models\SalesDetail;
use App\Models\SalesMaster;
use App\Models\Customer;
use App\Models\Product;
use Validator;
use Toastr;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = SalesMaster::with('customer')->orderBy('sale_date', 'desc')->get();
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('is_active', 1)->get();
        $products = Product::where('is_active', 1)->get();

        return view('sale.create', compact(['customers', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:1',
            'sale_price' => 'required|array',
            'sale_price.*' => 'numeric|min:0',
            'total' => 'required|array',
            'total.*' => 'numeric|min:0',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Validation Error');
            }
            return back()->withInput();
        }

        // Create Sales Master
        $salesMaster = SalesMaster::create([
            'customer_id' => $request->customer_id,
            'sale_date' => $request->sale_date,
            'total_quantity' => array_sum($request->quantity),
            'total_amount' => array_sum($request->total),
            'payment_method' => $request->payment_method,
            'payment' => $request->payment,
            'created_by' => auth()->id(),
        ]);

        // Create Sales Details
        foreach ($request->product_id as $index => $productId) {
            SalesDetail::create([
                'sales_master_id' => $salesMaster->id,
                'product_id' => $productId,
                'purchase_price' => $request->purchase_price[$index],
                'sale_price' => $request->sale_price[$index],
                'quantity' => $request->quantity[$index],
                'total' => $request->total[$index],
                'unit' => $request->unit[$index],
                'stock' => $request->stock[$index],
            ]);
        }

        Toastr::success('Sale created successfully!');
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $sale = SalesMaster::with(['salesDetails.product', 'salesDetails.unit', 'customer'])->findOrFail($id);
    return view('sale.show', compact('sale'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'salesMaster'  => SalesMaster::with('salesDetails')->findOrFail($id),
            'salesDetails' => SalesDetail::where('sales_master_id', $id)->get(),
            'customers' => Customer::where('is_active', 1)->get(),
            'products' => Product::where('is_active', 1)->get(),
        ];

        return view('sale.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:1',
            'sale_price' => 'required|array',
            'sale_price.*' => 'numeric|min:0',
            'total' => 'required|array',
            'total.*' => 'numeric|min:0',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Validation Error');
            }
            return back()->withInput();
        }

        $salesMaster = SalesMaster::findOrFail($id);
        $salesMaster->update([
            'customer_id' => $request->customer_id,
            'sale_date' => $request->sale_date,
            'total_quantity' => array_sum($request->quantity),
            'total_amount' => array_sum($request->total),
            'payment_method' => $request->payment_method,
            'payment' => $request->payment,
            'updated_by' => auth()->id(),
        ]);

        // Update Sales Details
        $salesMaster->salesDetails()->delete();
        foreach ($request->product_id as $index => $productId) {
            SalesDetail::create([
                'sales_master_id' => $salesMaster->id,
                'product_id' => $productId,
                'purchase_price' => $request->purchase_price[$index],
                'sale_price' => $request->sale_price[$index],
                'quantity' => $request->quantity[$index],
                'total' => $request->total[$index],
                'unit' => $request->unit[$index],
                'stock' => $request->stock[$index],
            ]);
        }

        Toastr::success('Sale updated successfully!');
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salesMaster = SalesMaster::findOrFail($id);
        $salesMaster->salesDetails()->delete();
        $salesMaster->delete();

        Toastr::success('Sale deleted successfully!');
        return redirect()->route('sales.index');
    }
}
