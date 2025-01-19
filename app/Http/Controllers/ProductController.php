<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use App\Models\Unit;
use Validator;
use Toastr;
use File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $subcategorys = SubCategory::where('is_active', 1)->get();
        $manufacturers = Manufacturer::where('is_active', 1)->get();
        $units = Unit::where('is_active', 1)->get();

        return view('product.create', compact(['categories', 'subcategorys', 'manufacturers', 'units']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'subcategory_id' => 'required',
                'category_id' => 'required',
                'manufacturer_id' => 'required',
                'unit_id' => 'required',
                'purchase_price' => 'required|numeric|min:0',
                'sale_price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'is_active' => 'boolean',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->subcategory_id = $request->subcategory_id;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->unit_id = $request->unit_id;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        // Handle image upload if available
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->is_active = $request->is_active ?? true;
        $product->created_by = auth()->id();
        $save = $product->save();
        if ($save) {
            Toastr::success('Success', 'Product added successfully!');
            return redirect()->route('products.index');
        } else {
            Toastr::error('Error', 'An error occurred while saving the product.');
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();
        $subcategorys = SubCategory::where('is_active', 1)->get();
        $manufacturers = Manufacturer::where('is_active', 1)->get();
        $units = Unit::where('is_active', 1)->get();

        return view('product.edit', compact(['product', 'categories', 'subcategorys', 'manufacturers', 'units']));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'subcategory_id' => 'required',
                'category_id' => 'required',
                'manufacturer_id' => 'required',
                'unit_id' => 'required',
                'purchase_price' => 'required|numeric|min:0',
                'sale_price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'is_active' => 'boolean',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->subcategory_id = $request->subcategory_id;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->unit_id = $request->unit_id;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $destination = 'uploads/products/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->is_active = $request->is_active ?? true;
        $product->updated_by = auth()->id();
        $save = $product->save();
        if ($save) {
            Toastr::success('Success', 'Product updated successfully!');
            return redirect()->route('products.index');
        } else {
            Toastr::error('Error', 'Any Problem Occured');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the product image if it exists
        $imagePath = 'uploads/products/' . $product->image;
        if ($product->image && File::exists($imagePath)) {
            File::delete($imagePath); // Delete the image file
        }

        $delete = $product->delete();
        if ($delete) {
            Toastr::success('Success', 'Product deleted successfully!');
            return redirect()->route('products.index');
        } else {
            Toastr::error('Error', 'Any Problem Occured');
            return redirect()->back();
        }
    }

    public function getProductDetails($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'unit_name' => $product->unit->name, // Assuming a relationship between Product and Unit
                'purchase_price' => $product->purchase_price,
                'sale_price' => $product->sale_price,
                'stock' => $product->stock,
            ]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
