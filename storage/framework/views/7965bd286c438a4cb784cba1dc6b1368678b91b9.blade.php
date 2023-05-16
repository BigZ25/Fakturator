<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['class','xOn:click'])
<x-wireui::icons.outline.calendar :class="$class" :x-on:click="$xOnClick" >

{{ $slot ?? "" }}
</x-wireui::icons.outline.calendar>