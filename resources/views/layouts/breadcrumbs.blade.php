<div class="text-start">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            {{-- Home Link --}}
            <li class="breadcrumb-item">
                <a href="{{ route("home") }}">Dashboard</a>
            </li>

            {{-- Loop through each segment in the URL and create breadcrumb links --}}
            @php
                $urlSegments = collect(Request::segments());
                $urlSegmentsCount = $urlSegments->count();
            @endphp

            @foreach ($urlSegments as $index => $segment)
                @php
                    $url = implode("/", $urlSegments->slice(0, $index + 1)->toArray());
                @endphp

                @if ($index + 1 === $urlSegmentsCount)
                    {{-- Current Page (last segment) --}}
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ ucwords(str_replace("-", " ", $segment)) }}
                    </li>
                @else
                    {{-- Intermediate Link --}}
                    <li class="breadcrumb-item">
                        <a href="{{ url($url) }}">{{ ucwords(str_replace("-", " ", $segment)) }}</a>
                    </li>
                @endif
            @endforeach

        </ol>
    </nav>
</div>
