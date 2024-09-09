@if (!empty($image))
    @php
        $image = (object) $image;
        $alt = $image->alt ?? "";
        $size = $size ?? "large";
        $src = wp_get_attachment_url($image->id, $size);
        $srcset = wp_get_attachment_image_srcset($image->id, $size);
        $sizes = wp_get_attachment_image_sizes($image->id, $size);
    @endphp
    @if ($size == '')
        <img width="{{ $image->width }}" height="{{ $image->height }}" src="{{ $image->url }}" class="{{ $class ?? '' }}" alt="{{ $alt }}" loading="lazy">
    @else
        <img width="{{ $image->width }}" height="{{ $image->height }}" src="{{ $src }}" class="{{ $class ?? '' }}" alt="{{ $alt }}" srcset="{{ $srcset }}" sizes="{{ $sizes }}" loading="lazy">
    @endif
@endif
