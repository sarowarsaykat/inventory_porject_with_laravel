<!DOCTYPE html>
<html>

<head>
    @include('shard.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        @include('shard.navber')
        @include('shard.sidebar')

        <div class="content-wrapper">

            <!-- form start-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Sub Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add
                                        Product</a>
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Manufacturer</th>
                                                <th>Unit</th>
                                                {{-- <th>Purchase Price</th>
                                                <th>Sale Price</th> --}}
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ optional($product->subcat)->name }}</td>
                                                    <td>{{ $product->manufacturer->company_name }}</td>
                                                    <td>{{ $product->unit->name }}</td>
                                                    {{-- <td>{{ $product->purchase_price }}</td>
                                                    <td>{{ $product->sale_price }}</td> --}}
                                                    <td>{{ $product->stock }}</td>
                                                    <td>
                                                        @if ($product->image)
                                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" width="70">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('products.destroy', $product->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end-->

        </div>

        @include('shard.footer')



    </div>


    @include('shard.style')
</body>

</html>
