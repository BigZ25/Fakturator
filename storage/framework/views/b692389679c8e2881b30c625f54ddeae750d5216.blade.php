<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['class'])
<x-wireui::icons.outline.lock-open :class="$class" >

{{ $slot ?? "" }}
</x-wireui::icons.outline.lock-open>