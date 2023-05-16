<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['class','xCloak','xShow','xOn:click'])
<x-wireui::icons.outline.x :class="$class" :x-cloak="$xCloak" :x-show="$xShow" :x-on:click="$xOnClick" >

{{ $slot ?? "" }}
</x-wireui::icons.outline.x>