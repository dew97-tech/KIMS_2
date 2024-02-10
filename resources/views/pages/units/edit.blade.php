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
                    <form method="post" action="{{ route("units.update", $unit->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="card-style">
                            <h2 class="mb-20">Edit Unit</h2>

                            {{-- Unit Name --}}
                            <div class="input-style-1 mb-3">
                                <label for="unit_name">Unit Name</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name"
                                    value="{{ $unit->unit_name }}">
                            </div>

                            {{-- Unit Shortform --}}
                            <div class="input-style-1 mb-3">
                                <label for="unit_shortform">Unit Shortform</label>
                                <input type="text" class="form-control" id="unit_shortform" name="unit_shortform"
                                    value="{{ $unit->unit_shortform }}">
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
    @endsection

    @push("plugin-scripts")
        <!-- Plugin js import here -->
    @endpush
