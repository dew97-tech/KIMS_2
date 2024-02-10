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
                    <form method="post" action="{{ route("products.update", $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-style">
                            <h2 class="mb-20">Edit Product</h2>
                            {{-- Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ $product->product_name }}">
                            </div>
                            {{-- Description --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_description">Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="1">{{ $product->product_description }}</textarea>
                            </div>
                            {{-- Price --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_price">Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="product_price" name="product_price"
                                    value="{{ $product->product_price }}">
                            </div>
                            {{-- Cost --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_cost">Cost <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="product_cost" name="product_cost"
                                    value="{{ $product->product_cost }}">
                            </div>

                            {{-- Categories --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_category">Category <span class="text-danger">*</span></label>
                                <select id='product_category' name='product_category' class='form-control'>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $product->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}
                                            </option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Brands --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_brand">Brand <span class="text-danger">*</span></label>
                                <select id='product_brand' name='product_brand' class='form-control'>
                                    @foreach ($brands as $brand)
                                        @if ($brand->id == $product->brand_id)
                                            <option value="{{ $brand->id }}" selected>{{ $brand->brand_name }}</option>
                                        @else
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Units --}}
                            <div class="input-style-1 mb-3">
                                <label for="product_unit">Unit <span class="text-danger">*</span></label>
                                <select id='product_unit' name='product_unit' class='form-control'>
                                    @foreach ($units as $unit)
                                        @if ($unit->id == $product->unit_id)
                                            <option value="{{ $unit->id }}" selected>{{ $unit->unit_shortform }}
                                            </option>
                                        @else
                                            <option value="{{ $unit->id }}">{{ $unit->unit_shortform }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Product</button>
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
