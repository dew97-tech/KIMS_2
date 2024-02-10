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
                    <form action="{{ route("products.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-style">
                            <h2 class="mb-20">Create Product</h2>
                            {{-- Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required
                                    placeholder="Name">
                            </div>
                            {{-- Description --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_description">Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" placeholder="Description"
                                    rows="1"></textarea>
                            </div>
                            {{-- Price --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_price">Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="product_price" name="product_price" required
                                    step="0.01" placeholder="Price">
                            </div>
                            {{-- Cost --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_cost">Cost <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="product_cost" name="product_cost" required
                                    step="0.01" placeholder="Cost">
                            </div>
                            {{-- Category --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_category">Category <span class="text-danger">*</span></label>
                                <select id="product_category" name="product_category" class="form-control" required>
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Brand --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_brand">Brand <span class="text-danger">*</span></label>
                                <select id="product_brand" name="product_brand" class="form-control" required>
                                    <option value="">Select brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Unit --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_unit">Unit <span class="text-danger">*</span></label>
                                <select id="product_unit" name="product_unit" class="form-control" required>
                                    <option value="">Select unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Image
                            <div class="input-style-1 mb-3">
                                <label for="product_image">Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="product_image" name="product_image" required
                                    placeholder="Image">
                            </div> --}}

                            {{-- Submit --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Product</button>
                            </div>
                        </div>
                    </form>

                    <!-- end card -->

                </div>
            </div>
        </div>
    </div>
@endsection
