<div class="profile-box">
    <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown"
        aria-expanded="false">
        <div class="profile-info">
            <div class="info text-start">
                <div class="image">
                    <img src="{{ asset("assets/images/profile/profile-image.png") }}" alt="{{ Auth::user()->name }}" />
                </div>
                <div>
                    <h6 class="fw-800">{{ Auth::user()->name }}</h6>
                    <p class="text-primary">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </button>
    <ul class="dropdown-menu p-1" aria-labelledby="profile">
        <li>
            <a class="dropdown-item text-start text-dark" href="{{ route("profile.show") }}">
                <i class="lni lni-user"></i> {{ __("Change Password") }}
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <form method="POST" action="{{ route("logout") }}">
                @csrf
                <a class="dropdown-item text-start text-dark" href="{{ route("logout") }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="lni lni-exit"></i> {{ __("Sign Out") }}
                </a>
            </form>
        </li>
    </ul>
</div>
