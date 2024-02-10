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
                    <form method="post" action="{{ route("brands.update", $brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="card-style">
                            <h2 class="mb-20">Edit Brand</h2>

                            {{-- Brand Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name"
                                    value="{{ $brand->brand_name }}">
                            </div>

                            {{-- Submit Button --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("plugin-scripts")
    <!-- Plugin js import here -->
@endpush
