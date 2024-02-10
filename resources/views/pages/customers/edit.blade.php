@extends("layouts.app")

@push("header-script")
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
@endpush

@section("content")
    @include("layouts.breadcrumbs")
    <div class="container">
        <div class="form-elements-wrapper">
            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <form method="post" action="{{ route("customers.update", $customer->id) }}">
                        @csrf
                        @method("PUT")

                        <div class="card-style">
                            <h2 class="mb-20">Edit Customer</h2>
                            {{-- Customer Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name"
                                    value="{{ $customer->customer_name }}" required>
                            </div>

                            {{-- Customer Email --}}
                            <div class="input-style-1 mb-3">
                                <label for="customer_email">Email</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email"
                                    value="{{ $customer->customer_email }}" required>
                            </div>

                            {{-- Customer Phone --}}
                            <div class="input-style-1 mb-3">
                                <label for="customer_phone">Phone</label>
                                <input type="text" class="form-control" id="customer_phone" name="customer_phone"
                                    value="{{ $customer->customer_phone }}" required>
                            </div>

                            {{-- Customer Address --}}
                            <div class="input-style-1 mb-3">
                                <label for="customer_address">Address</label>
                                <input type="text" class="form-control" id="customer_address" name="customer_address"
                                    value="{{ $customer->customer_address }}" required>
                            </div>

                            {{-- Submit Button --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push("plugin-scripts")
        <!-- Plugin js import here -->
    @endpush
