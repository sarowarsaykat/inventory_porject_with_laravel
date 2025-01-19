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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Create Sale</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sales.store') }}" method="POST">
                            @csrf

                            <!-- Customer and Sale Date -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="customer_id">Customer</label>
                                    <select class="form-control" id="customer_id" name="customer_id" required>
                                        <option value="" disabled selected>Select a customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sale_date">Sale Date</label>
                                    <input type="date" id="sale_date" name="sale_date" class="form-control"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>

                            <!-- Sales Table -->
                            <div>
                                <h4>Sale Items</h4>
                                <button id="add-row-btn" type="button" class="btn btn-primary mb-2">Add Product</button>
                                <table id="sales-table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit</th>
                                            <th>Purchase Price</th>
                                            <th>Sale Price</th>
                                            <th>Quantity</th>
                                            <th>Stock</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control product-select" name="product_id[]" required>
                                                    <option value="" disabled selected>Select a product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="unit[]" class="form-control" readonly></td>
                                            <td><input type="number" name="purchase_price[]" class="form-control" readonly></td>
                                            <td><input type="number" name="sale_price[]" class="form-control" readonly></td>
                                            <td><input type="number" name="quantity[]" class="form-control"></td>
                                            <td><input type="number" name="stock[]" class="form-control" readonly></td>
                                            <td><input type="number" name="total[]" class="form-control" readonly></td>
                                            <td><button type="button" class="btn btn-danger delete-row-btn">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Total Quantity and Amount -->
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Total Quantity</label>
                                    <input type="number" id="total_quantity" name="total_quantity" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Total Amount</label>
                                    <input type="number" id="total_amount" name="total_amount" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Payment Details -->
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Payment Method</label>
                                    <select id="payment_method" name="payment_method" class="form-control" required>
                                        <option value="" disabled selected>Select a method</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Rocket">Rocket</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Payment</label>
                                    <input type="number" id="payment" name="payment" class="form-control" required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- body end-->

        @include('shard.footer')

    </div>

    @include('shard.style')

    <!-- jQuery Script -->
    <script>
        $(document).ready(function () {
            // Add a new row
            $('#add-row-btn').click(function () {
                const newRow = `
                    <tr>
                        <td>
                            <select class="form-control product-select" name="product_id[]" required>
                                <option value="" disabled selected>Select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="unit[]" class="form-control" readonly></td>
                        <td><input type="number" name="purchase_price[]" class="form-control" readonly></td>
                        <td><input type="number" name="sale_price[]" class="form-control" readonly></td>
                        <td><input type="number" name="quantity[]" class="form-control"></td>
                        <td><input type="number" name="stock[]" class="form-control" readonly></td>
                        <td><input type="number" name="total[]" class="form-control" readonly></td>
                        <td><button type="button" class="btn btn-danger delete-row-btn">Delete</button></td>
                    </tr>`;
                $('#sales-table tbody').append(newRow);
            });
    
            // Fetch product details via AJAX
            $(document).on('change', '.product-select', function () {
                const productId = $(this).val();
                const $row = $(this).closest('tr');
    
                if (productId) {
                    $.ajax({
                        url: `/product-details/${productId}`, // Endpoint to fetch product details
                        method: 'GET',
                        success: function (data) {
                            $row.find('input[name="unit[]"]').val(data.unit_name); // Update unit field
                            $row.find('input[name="purchase_price[]"]').val(data.purchase_price);
                            $row.find('input[name="sale_price[]"]').val(data.sale_price);
                            $row.find('input[name="stock[]"]').val(data.stock);
                        },
                        error: function () {
                            alert('Error fetching product details.');
                        }
                    });
                }
            });
    
            // Delete a row
            $(document).on('click', '.delete-row-btn', function () {
                $(this).closest('tr').remove();
                calculateTotals();
            });
    
            // Calculate totals
            function calculateTotals() {
                let totalQuantity = 0;
                let totalAmount = 0;
    
                $('#sales-table tbody tr').each(function () {
                    const quantity = parseFloat($(this).find('input[name="quantity[]"]').val()) || 0;
                    const salePrice = parseFloat($(this).find('input[name="sale_price[]"]').val()) || 0;
                    const total = quantity * salePrice;
    
                    $(this).find('input[name="total[]"]').val(total.toFixed(2));
                    totalQuantity += quantity;
                    totalAmount += total;
                });
    
                $('#total_quantity').val(totalQuantity);
                $('#total_amount').val(totalAmount.toFixed(2));
            }
    
            // Update totals on quantity change
            $(document).on('input', 'input[name="quantity[]"]', calculateTotals);
        });
    </script>
    
</body>

</html>
