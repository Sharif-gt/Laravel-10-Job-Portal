@props(['height', 'width', 'source'])
<div>
    <img {{ $attributes->merge(['style' => "height: {$height}px; width: {$width}px; object-fit: fill;"]) }}
        src="{{ $source }}" alt="">
</div>
