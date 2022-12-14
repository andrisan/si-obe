@unless ($breadcrumbs->isEmpty())
    <div class="text-sm breadcrumbs pl-2 py-6 font-bold text-gray-600">
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li class="text-blue-600">
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless
