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
                                <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Supplier and Purchase Date -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="supplier_id">Supplier</label>
                                            <select class="form-control" id="supplier_id" name="supplier_id" required>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}"
                                                        {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="purchase_date">Purchase Date</label>
                                            <input type="date" id="purchase_date" name="purchase_date"
                                                class="form-control" value="{{ $purchase->purchase_date }}" required>
                                        </div>
                                    </div>

                                    <!-- Purchase Items Table -->
                                    <div>
                                        <h4>Purchase Items</h4>
                                        <button id="add-row-btn" type="button" class="btn btn-primary mb-2">Add
                                            Product</button>
                                        <table id="purchases-table" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Unit</th>
                                                    <th>Purchase Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($purchase->details as $detail)
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="product_id[]" required>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}"
                                                                        {{ $product->id == $detail->product_id ? 'selected' : '' }}>
                                                                        {{ $product->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="unit_id[]" required>
                                                                @foreach ($units as $unit)
                                                                    <option value="{{ $unit->id }}"
                                                                        {{ $unit->id == $detail->unit_id ? 'selected' : '' }}>
                                                                        {{ $unit->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="purchase_price[]"
                                                                class="form-control"
                                                                value="{{ $detail->purchase_price }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity[]" class="form-control"
                                                                value="{{ $detail->quantity }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="total[]" class="form-control"
                                                                value="{{ $detail->total }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="detail_id[]"
                                                                value="{{ $detail->id }}">
                                                            <button type="button"
                                                                class="btn btn-danger delete-row-btn">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Total Quantity and Amount -->
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label>Total Quantity</label>
                                            <input type="number" id="total_quantity" name="total_quantity"
                                                class="form-control" value="{{ $purchase->total_quantity }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Amount</label>
                                            <input type="number" id="total_amount" name="total_amount"
                                                class="form-control" value="{{ $purchase->total_amount }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
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
    <!-- jQuery Script -->
    <script>
        $(document).ready(function() {
            // Add a new row
            $('#add-row-btn').click(function() {
                const newRow = `
                    <tr>
                        <td>
                            <select class="form-control" name="product_id[]" required>
                                <option value="" disabled selected>Select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="unit_id[]" required>
                                <option value="" disabled selected>Select a unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="purchase_price[]" class="form-control" required></td>
                        <td><input type="number" name="quantity[]" class="form-control" required></td>
                        <td><input type="number" name="total[]" class="form-control" readonly></td>
                        <td><button type="button" class="btn btn-danger delete-row-btn">Delete</button></td>
                    </tr>`;
                $('#purchases-table tbody').append(newRow);
            });

            // Delete a row
            $(document).on('click', '.delete-row-btn', function() {
                $(this).closest('tr').remove();
                calculateTotals();
            });

            // Calculate totals
            function calculateTotals() {
                let totalQuantity = 0;
                let totalAmount = 0;

                $('#purchases-table tbody tr').each(function() {
                    const quantity = parseFloat($(this).find('input[name="quantity[]"]').val()) || 0;
                    const purchasePrice = parseFloat($(this).find('input[name="purchase_price[]"]')
                    .val()) || 0;
                    const total = quantity * purchasePrice;

                    $(this).find('input[name="total[]"]').val(total.toFixed(2));
                    totalQuantity += quantity;
                    totalAmount += total;
                });

                $('#total_quantity').val(totalQuantity);
                $('#total_amount').val(totalAmount.toFixed(2));
            }

            // Update totals on quantity or price change
            $(document).on('input', 'input[name="quantity[]"], input[name="purchase_price[]"]', calculateTotals);
        });
    </script>
</body>

</html>
