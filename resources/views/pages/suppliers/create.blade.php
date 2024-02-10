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
                    <form action="{{ route("suppliers.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-style">

                            <h2 class="mb-20">Create Supplier</h2>



                            {{-- Supplier Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_name">Supplier Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" required
                                    placeholder="Supplier Name">
                            </div>

                            {{-- Supplier Phone --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_phone">Supplier Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="supplier_phone" name="supplier_phone"
                                    required placeholder="Supplier Phone">
                            </div>

                            {{-- Supplier Address --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_address">Supplier Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="supplier_address" name="supplier_address"
                                    required placeholder="Supplier Address">
                            </div>

                            {{-- Submit Button --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Supplier</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
