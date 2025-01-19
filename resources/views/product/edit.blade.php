<!DOCTYPE html>
<html>

<head>
    @include('shard.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('shard.navber')
        @include('shard.sidebar')

        <!-- body start-->
        <div class="content-wrapper">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $product->name) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory_id">Sub Category</label>
                                        <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                                            <option value="" disabled>Select a subcategory</option>
                                            @foreach ($subcategorys as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="" disabled>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="manufacturer_id">Manufacturer</label>
                                        <select class="form-control" id="manufacturer_id" name="manufacturer_id"
                                            required>
                                            <option value="" disabled>Select a manufacturer</option>
                                            @foreach ($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}"
                                                    {{ $product->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>
                                                    {{ $manufacturer->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_id">Units</label>
                                        <select class="form-control" id="unit_id" name="unit_id" required>
                                            <option value="" disabled>Select a unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ $product->unit_id == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="purchase_price" class="form-label">Purchase Price</label>
                                        <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                                            value="{{ old('purchase_price', $product->purchase_price) }}" step="0.01" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <input type="number" class="form-control" id="sale_price" name="sale_price"
                                            value="{{ old('sale_price', $product->sale_price) }}" step="0.01" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            value="{{ old('stock', $product->stock) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label h5">Product Image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            accept="image/*">
                                        @if ($product->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                    alt="Current Image" width="100">
                                                <p class="text-muted">Current Image</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="is_active">Active</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0" {{ !$product->is_active ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- body end-->

        @include('shard.footer')

    </div>

    @include('shard.script')
</body>

</html>
