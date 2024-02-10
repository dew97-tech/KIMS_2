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
                    <form action="{{ route("categories.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-style">
                            <h2 class="mb-20">Create Category</h2>

                            {{-- Category Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="category_name">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="Category Name" required>
                            </div>

                            {{-- Parent Category --}}
                            <div class="input-style-1 mb-3">
                                <label for="parent_category_id">Parent Category</label>
                                <select id='parent_category_id' name='parent_category_id' class='form-control'>
                                    <option value="">Select parent category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Submit Button --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Category</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push("plugin-scripts")
    <!-- Plugin js import here -->
@endpush
