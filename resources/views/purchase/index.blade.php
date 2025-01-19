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
                                <h3 class="card-title">Purchase List</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('purchases.create') }}" class="btn btn-primary mb-3">Add
                                    Purchase</a>
                                <table class="table table-bordered"  id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Purchase Date</th>
                                            <th>Supplier</th>
                                            <th>Total Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $purchase->purchase_date }}</td>
                                                <td>{{ $purchase->supplier->name }}</td>
                                                <td>{{ $purchase->total_quantity }}</td>
                                                <td>{{ $purchase->total_amount }}</td>
                                                <td>
                                                    <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-sm">View</a>
                            
                                                    <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                                    <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this purchase?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
