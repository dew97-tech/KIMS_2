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
                    <form action="{{ route("units.store") }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-style">
                            <h2 class="mb-20">Create Unit</h2>

                            {{-- Unit Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="unit_name">Unit Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name"
                                    placeholder="Unit Name" required>
                            </div>

                            {{-- Unit Shortform --}}
                            <div class="input-style-1 mb-3">
                                <label for="unit_shortform">Unit Shortform <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="unit_shortform" name="unit_shortform"
                                    placeholder="Unit Shortform" required>
                            </div>

                            {{-- Submit Button --}}
                            <div class="input-style-1 mb-3 text-end mt-10">
                                <button type="submit" class="main-btn success-btn btn-hover">Save Unit</button>
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
