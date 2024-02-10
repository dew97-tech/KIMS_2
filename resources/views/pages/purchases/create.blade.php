@extends("layouts.app")

@push("header-script")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
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
                            <h2 class="mb-10">Add Purchase</h2>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                {{-- Date --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="date" class="pb-1 form-label font-weight-bold">Select Date</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            max="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                {{-- Purchase No --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="purchase_no" class="pb-1 form-label font-weight-bold">Purchase
                                            No</label>
                                        <input type="text" class="form-control" id="purchase_no" name="purchase_no"
                                            value="{{ $purchase_no }}" disabled>
                                    </div>
                                </div>
                                {{-- Supplier ID --}}
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="supplier_id" class="pb-1 form-label font-weight-bold">Supplier
                                            Name</label>
                                        <select id='supplier_id' name='supplier_id' class='form-control' required>
                                            <option value="">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- End Card Body --}}

                            <hr>

                            {{-- Dynamic Table Row --}}
                            <form action="{{ route("purchases.store") }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table-sm table-bordered" width="100%" style="border-color: #dddddd">
                                        <thead>
                                            <tr>
                                                <th class="text-start">Product Name</th>
                                                <th class="text-start">Unit</th>
                                                <th class="text-start">Per Unit Cost</th>
                                                <th class="text-start">Cost</th>
                                                <th class="text-start">Add</th>
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
                                                {{-- Unit --}}
                                                <td class="text-center">
                                                    <input id="buying_quantity" type="number"
                                                        class="form-control buying_quantity text-right"
                                                        name="buying_quantity[]">
                                                </td>
                                                {{-- Per Unit Cost --}}
                                                <td class="text-center">
                                                    <input id="unit_price" type="number"
                                                        class="form-control unit_price text-right" name="unit_price[]">
                                                </td>
                                                {{-- Buying Price === Product Cost --}}
                                                <td class="text-center">
                                                    <input type="number" class="form-control buying_price"
                                                        id="buying_price" step="0.01" placeholder="0.00"
                                                        name="buying_price[]" value="@{{ buying_price }}" readonly>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn btn-md btn-primary addeventmore rounded-pill"
                                                        id="addeventmore">
                                                        <i class="fa-solid fa-circle-plus fa-xl mb-0 mt-0 pt-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-uppercase p-3 text-end fw-bold">Total Cost:
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
                                <div class="form-group my-2 text-end">
                                    <button type="submit" class="main-btn success-btn btn-sm mt-4 fs-6 btn-hover"
                                        id="storeButton">Purchase Now</button>
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
                        url: '/products/get-product-cost/' + product_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data && data.product_cost) {
                                row.find('.unit_price').val(data.product_cost);
                            } else {
                                row.find('.unit_price').val('');
                            }
                        },
                        error: function(e) {
                            console.error('Error fetching product price:', e);
                        }
                    });
                } else {
                    row.find('.unit_price').val('');
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]"  value="@{{ date }}">
            <input type="hidden" name="purchase_no[]"  value="@{{ purchase_no }}">
            <input type="hidden" name="supplier_id[]"  value="@{{ supplier_id }}">
            <td class="text-center font-bold">
                <input type="hidden" name="product_id_val[]" value="@{{ product_id_val }}">@{{ product_name }}
            </td>
            <td class="text-center">
                <input type="number" min="1" class="form-control form-control text-center buying_quantity"
                    name="buying_quantity_val[]" value="@{{ buying_quantity_val }}" readonly>
            </td>
            <td class="text-center">
                <input type="number" min="1" class="form-control form-control text-center unit_price" name="unit_price_val[]"
                    value="@{{ unit_price_val }}" readonly>
            </td>
            <td class="text-center">
                <input type="number" class="form-control text-center buying_price" id="buying_price" name="buying_price_val[]" value="@{{ buying_price_val }}" readonly>
            </td>
            <td class="text-center" colspan="2">
                <button type="button" class="btn btn-md btn-danger removeeventmore py-2" id="removeeventmore"><i class="fa-regular fa-trash-can fa-xl mt-0 mb-0 pt-1"></i></button>
            </td>
        </tr>
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- AddMore Button Event Trigger --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".addeventmore", function() {
                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var supplier_name = $('#supplier_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                var unit_price = $('#unit_price').val();
                var buying_quantity = $('#buying_quantity').val();
                var buying_price = (unit_price * buying_quantity).toFixed(2);

                // Store the values of input fields in separate variables
                var unit_price_val = unit_price;
                var buying_quantity_val = buying_quantity;
                var buying_price_val = buying_price;
                var product_id_val = product_id;
                console.log(buying_quantity_val);
                if (date == '') {
                    $.notify("Date is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (purchase_no == '') {
                    $.notify("Purchase No is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (supplier_id == '') {
                    $.notify("Supplier is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product Field is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (buying_quantity == '') {
                    $.notify("Buying Quantity Field is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (unit_price == '') {
                    $.notify("Cost Field is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                var source = $("#document-template").html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    supplier_name: supplier_name,
                    product_id_val: product_id_val,
                    product_name: product_name,
                    unit_price_val: unit_price_val,
                    buying_quantity_val: buying_quantity_val,
                    buying_price_val: buying_price_val
                };
                var html = tamplate(data);
                console.log(data);
                $("#addRow").append(html);
                $('#unit_price').val('');
                $('#buying_quantity').val('');
                $('#buying_price').val('');
                $('#product_id').val('');
            });

            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });
            $(document).on("keyup", '.unit_price,.buying_quantity', function() {
                var unit_price = $(this).closest("tr").find("input.unit_price").val();

                var qty = $(this).closest("tr").find("input.buying_quantity").val();
                buying_price = unit_price * qty;
                $(this).closest("tr").find("input.buying_price").val(buying_price.toFixed(2));
                totalAmountPrice();
            });

            function totalAmountPrice() {
                var sum = 0;
                $(".buying_price").each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum.toFixed(2));
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@push("plugin-scripts")
    <!-- Plugin js import here -->
    <script src="{{ asset("js/handlebars.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
@endpush
