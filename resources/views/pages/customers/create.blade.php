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
                    <form action="{{ route("customers.store") }}" method="post">
                        @csrf
                        <div class="card-style">
                            <h2 class="mb-20">Create Customer</h2>
                            <div class="input-style-1 mb-3">
                                <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            </div>

                            <div class="input-style-1 mb-3">
                                <label for="customer_email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email"
                                    required>
                            </div>

                            <div class="input-style-1 mb-3">
                                <label for="customer_phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_phone" name="customer_phone"
                                    required>
                            </div>

                            <div class="input-style-1 mb-3">
                                <label for="customer_address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_address" name="customer_address"
                                    required>
                            </div>

                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Customer</button>
                            </div>
                    </form>

                </div>
            </div>
        @endsection

        @push("plugin-scripts")
            <!-- Plugin js import here -->
        @endpush
