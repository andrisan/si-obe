<a href="javascript:history.back()">
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <i class="fa fa-arrow-left"></i>
    @endisset
</a>
