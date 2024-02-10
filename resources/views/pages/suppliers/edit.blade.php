@extends("layouts.app")

@push("header-script")
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
@endpush

@section("content")
    <div class="container">
        <div class="form-elements-wrapper">
            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <form method="post" action="{{ route("suppliers.update", $supplier->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-style">

                            <h2 class="mb-20">Edit Supplier</h2>


                            {{-- Supplier Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_name">Supplier Name</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name"
                                    value="{{ $supplier->supplier_name }}">
                            </div>

                            {{-- Supplier Phone --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_phone">Supplier Phone</label>
                                <input type="text" class="form-control" id="supplier_phone" name="supplier_phone"
                                    value="{{ $supplier->supplier_phone }}">
                            </div>

                            {{-- Supplier Address --}}
                            <div class="input-style-1 mb-3">
                                <label for="supplier_address">Supplier Address</label>
                                <input type="text" class="form-control" id="supplier_address" name="supplier_address"
                                    value="{{ $supplier->supplier_address }}">
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Supplier</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push("plugin-scripts")
    <!-- Plugin js import here -->
@endpush
