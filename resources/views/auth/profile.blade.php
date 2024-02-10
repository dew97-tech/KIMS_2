@extends("layouts.app")

@section("content")
    @include("layouts.breadcrumbs", [
        "title" => __("My profile"),
        "breadcrumbs" => [
            "#" => __("My profile"),
        ],
    ])
    <div class="d-flex justify-content-center">
        <div class="card-style-3 col-lg-10">
            <h2 class="mb-10">User Profile</h2>
            <div class="card-content">
                @if ($message = Session::get("success"))
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <h4 class="alert-heading">Success</h4>
                            <p class="text-medium">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route("profile.update") }}" method="POST">
                    @csrf
                    @method("PUT")


                    <div class="col-12">
                        <div class="input-style-1 mb-3">
                            <label for="name">{{ __("Name") }}</label>
                            <input type="text" @error("name") class="form-control is-invalid" @enderror name="name"
                                id="name" placeholder="{{ __("Name") }}"
                                value="{{ old("name", auth()->user()->name) }}" required>
                            @error("name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1 mb-3">
                            <label for="email">{{ __("Email") }}</label>
                            <input @error("email") class="form-control is-invalid" @enderror type="email" name="email"
                                id="email" placeholder="{{ __("Email") }}"
                                value="{{ old("email", auth()->user()->email) }}" required>
                            @error("email")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1 mb-3">
                            <label for="password">{{ __("New password") }}</label>
                            <input type="password"
                                @error("password") class="form-control is-invalid"
                                       @enderror
                                name="password" id="password" placeholder="{{ __("New password") }}" required>
                            @error("password")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1 mb-3">
                            <label for="password_confirmation">{{ __("New password confirmation") }}</label>
                            <input type="password"
                                @error("password") class="form-control is-invalid"
                                       @enderror
                                name="password_confirmation" id="password_confirmation"
                                placeholder="{{ __("New password confirmation") }}" required>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-end flex-wrap">
                            <button type="submit" class="main-btn success-btn btn-sm btn-hover text-center">
                                {{ __("Submit") }}
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
