@extends("layouts.app")

@push("header-script")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="{{ asset("js/handlebars.js") }}"></script>
@endpush

@section("content")
    @include("layouts.breadcrumbs")
    <div class="container">
        <div class="form-elements-wrapper">
            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card-style mb-30">
                        <div class="d-flex justify-content-between mb-3">
                            <h2 class="mb-10">Add Order</h2>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                {{-- Order Date --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="order_date" class="pb-1 form-label font-weight-bold">Select Order
                                            Date</label>
                                        <input type="date" class="form-control" id="order_date" name="order_date"
                                            max="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                {{-- Order No --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="order_no" class="pb-1 form-label font-weight-bold">Order No</label>
                                        <input type="text" class="form-control" id="order_no" name="order_no"
                                            value="{{ $order_no }}" disabled>
                                    </div>
                                </div>
                                {{-- Customer Name --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="customer_id" class="pb-1 form-label font-weight-bold">Customer
                                            Name</label>
                                        <select id='customer_id' name='customer_id' class='select form-control'
                                            data-mdb-filter="true" required>
                                            <option value="">Select Customer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- End Card Body --}}
                            <hr>
                            {{-- Dynamic Table Row --}}
                            <form action="{{ route("orders.store") }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table-sm table-bordered" width="100%" style="border-color: #dddddd"
                                        id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-start">Product Name</th>
                                                <th class="text-start">Quantity</th>
                                                <th class="text-start">Per Unit Price</th>
                                                <th class="text-start">Total Amount</th>
                                                <th class="text-start">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addRow" class="addRow">
                                            <tr>
                                                {{-- Product --}}
                                                <td class="dropdown">
                                                    <select id='product_id' name='product_id'
                                                        class='form-control mdb-select product-dropdown'>
                                                        <option value="">Select Products</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                {{-- Quantity --}}
                                                <td class="text-center">
                                                    <input id="quantity" type="number"
                                                        class="form-control quantity text-right" name="quantity[]"
                                                        min="1">
                                                </td>
                                                {{-- Product Price --}}
                                                <td class="text-center">
                                                    <input id="product_price" type="number" step="0.01"
                                                        class="form-control product_price text-right"
                                                        name="product_price[]">
                                                </td>
                                                {{-- Total Amount --}}
                                                <td class="text-center">
                                                    <input type="number" class="form-control text-start total_amount"
                                                        id="total_amount" placeholder="0.00" name="total_amount[]" readonly>
                                                </td>
                                                {{-- Action --}}
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-md btn-primary addeventmore"
                                                        id="addeventmore">
                                                        <i class="fa-solid fa-circle-plus fa-xl mb-0 mt-0 pt-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            {{-- Grand Total --}}
                                            <tr>
                                                <td colspan="3" class="text-uppercase p-3 text-end fw-bold">Grand Total:
                                                </td>
                                                <td class="p-1 text-start">
                                                    <input type="text" name="estimated_amount" value="0.00"
                                                        id="estimated_amount" class="form-control estimated_amount"
                                                        readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="form-group mt-4 d-flex justify-content-between align-items-center">
                                    {{-- Discount Amount --}}
                                    <div class="md-3">
                                        <input type="number" step="0.1" min="0" placeholder="Apply Discount"
                                            class="form-control" id="discount_amount" name="discount_amount">
                                    </div>
                                    <button type="submit" class="main-btn success-btn btn-sm mt-2 fs-6 btn-hover"
                                        id="storeButton">Create Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Dyanmic Table Row --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("change", ".product-dropdown", function() {
                var product_id = $(this).val();
                var row = $(this).closest("tr");

                if (product_id) {
                    // Use jQuery ajax to make an AJAX request to get the product price based on the selected product_id
                    $.ajax({
                        url: '/products/get-product-price/' + product_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data && data.product_price) {
                                row.find('.product_price').val(data.product_price);
                            } else {
                                row.find('.product_price').val('');
                            }
                        },
                        error: function(e) {
                            console.error('Error fetching product price:', e);
                        }
                    });
                } else {
                    row.find('.product_price').val('');
                }
            });

            // ... Your other scripts ...
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="order_no_val[]" class="order_no" value="@{{ order_no_val }}">
            <input type="hidden" name="customer_name_val[]" class="customer_name" value="@{{ customer_name_val }}">
            <input type="hidden" name="customer_id_val[]" class="customer_id" value="@{{ customer_id_val }}">
            <input type="hidden" name="order_date_val[]" class="order_date" value="@{{ order_date_val }}">
            <input type="hidden" name="product_name_val[]" class="product_name" value="@{{ product_name_val }}">
        <td class="text-center font-bold">
            <input type="hidden" name="product_id_val[]" class="product_id" value="@{{ product_id_val }}">@{{ product_name_val }}
        </td>
        <td class="text-center">
            <input type="number" min="1" class="form-control form-control text-center quantity"
                name="quantity_val[]" value="@{{ quantity_val }}">
        </td>
        <td class="text-center">
            <input type="number" min="0" step="0.01" class="form-control form-control text-center product_price"
                name="product_price_val[]" id="product_price" value="@{{ product_price_val }}" readonly>
        </td>
        <td class="text-center">
            <input type="text" class="form-control form-control text-center total_amount"
                name="total_amount_val[]" id="total_amount" value="@{{ total_amount_val }}" readonly>
        </td>
        <td class="text-center" colspan="2">
            <button type="button" class="btn btn-md btn-danger removeeventmore py-2" id="removeeventmore">
                <i class="fa-regular fa-trash-can fa-xl mt-0 mb-0 pt-1"></i>
            </button>
        </td>
    </tr>
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- AddMore Button Event Trigger --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".addeventmore", function() {
                var order_date = $('#order_date').val();
                var order_no = $('#order_no').val();
                var customer_id = $('#customer_id').val();
                var customer_name = $('#customer_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                var quantity = $('#quantity').val();
                var product_price = $('#product_price').val();
                var total_amount = (quantity * product_price).toFixed(2);

                // Store the values of input fields in separate variables
                var order_date_val = order_date;
                var order_no_val = order_no;
                var product_id_val = product_id;
                var product_name_val = product_name;
                var quantity_val = quantity;
                var product_price_val = product_price;
                var total_amount_val = total_amount;
                var customer_id_val = customer_id;
                var customer_name_val = customer_name;
                if (order_date == '') {
                    $.notify("Order Date is Required", {
                        globalPosition: 'top right',
                        className: 'error',

                    });
                    return false;
                }
                if (customer_id == '') {
                    $.notify("Customer Name is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_name == '') {
                    $.notify("Product Name is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (quantity == '') {
                    $.notify("Quantity is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_price == '') {
                    $.notify("Product Price is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                total_amount = (parseFloat(quantity) * parseFloat(product_price)).toFixed(2);

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    order_date_val: order_date,
                    order_no_val: order_no,
                    product_id_val: product_id,
                    product_name_val: product_name,
                    quantity_val: quantity,
                    product_price_val: product_price,
                    total_amount_val: total_amount,
                    customer_id_val: customer_id,
                    customer_name_val: customer_name,
                };
                var html = template(data);
                console.log(data);
                $("#addRow").append(html);
                $('#quantity').val('');
                $('#product_id').val('');
                $('#product_price').val('');
                $('#total_amount').val('');
                totalAmountPrice();
            });

            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on("keyup", '.quantity, .product_price', function() {
                var row = $(this).closest("tr");
                var quantity = row.find(".quantity").val();
                var product_price = row.find(".product_price").val();
                var total_amount = (parseFloat(quantity) * parseFloat(product_price)).toFixed(2);
                row.find(".total_amount").val(total_amount);
                totalAmountPrice();
            });

            function totalAmountPrice() {
                var sum = 0;
                $(".total_amount").each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });

                // Apply discount
                var discountAmount = $('#discount_amount').val();
                if (!isNaN(discountAmount) && discountAmount.length != 0) {
                    var discountPercentage = parseFloat(discountAmount);
                    var discount = (sum * discountPercentage) / 100;
                    sum -= discount;
                }

                $('#estimated_amount').val(sum.toFixed(2));
            }

            // Call the function whenever total_amount or discount_amount changes
            $(".total_amount, #discount_amount").on("input", totalAmountPrice);
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@push("plugin-scripts")
    <!-- Plugin js import here -->
    <script src="{{ asset("js/handlebars.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#myTable').DataTable();

            // Display notifications
            @if (session("alert-type") && session("message"))
                var alertType = "{{ session("alert-type") }}";
                var message = "{{ session("message") }}";

                if (alertType === 'error') {
                    // Use your notification library to show an error message
                    $.notify(message, {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                } else if (alertType === 'success') {
                    // Use your notification library to show a success message
                    $.notify(message, {
                        globalPosition: 'top right',
                        className: 'success'
                    });
                }
            @endif
        });
    </script>
@endpush
