<!DOCTYPE html>
<html>

<head>
    @include('shard.css')
    <style>
        @media print {
          .hide-print{
               display: none;
          }
       }
      </style>
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
                                <div class="card-header text-center">
                                    <h3 class="mb-0">Purchase Invoice</h3>
                                    <p class="mb-0"><strong>Invoice ID:</strong> {{ $purchase->id }}</p>
                                    <p><strong>Date:</strong> {{ $purchase->purchase_date }}</p>
                                </div>
                                <div class="card-body">

                                    <!-- Supplier Information -->
                                    <div class="mb-4">
                                        <h5 class="mb-3">Supplier Details</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> {{ $purchase->supplier->name }}
                                                </p>
                                                <p><strong>Email:</strong>
                                                    {{ $purchase->supplier->email ?? 'N/A' }}</p>
                                                <p><strong>Phone:</strong>
                                                    {{ $purchase->supplier->phone ?? 'N/A' }}</p>
                                                    <p><strong>Address:</strong>
                                                        {{ $purchase->supplier->address ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Items Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Purchase Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($purchase->details as $index => $detail)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $detail->product->name }}</td>
                                                        <td>{{ $detail->unit->name }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td>{{ number_format($detail->purchase_price, 2) }}
                                                        </td>
                                                        <td>{{ number_format($detail->total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th>Total Quantity</th>
                                                    <th>{{ $purchase->total_quantity }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th>Total Amount</th>
                                                    <th>{{ number_format($purchase->total_amount, 2) }}
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <!-- Footer Buttons -->
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('purchases.index') }}"
                                            class="btn btn-secondary hide-print">Back</a>
                                        <button onclick="window.print()" class="btn btn-primary hide-print" >Print
                                            Invoice</button>
                                    </div>
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


    @include('shard.script')
</body>

</html>
