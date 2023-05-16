<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['icon','flat'])
<x-button :icon="$icon" :flat="$flat" {{ $attributes }}>

{{ $slot ?? "" }}
</x-button>