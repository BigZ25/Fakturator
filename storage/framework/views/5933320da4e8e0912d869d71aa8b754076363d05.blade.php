<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['borderless','shadowless','label','hint','cornerHint','icon','rightIcon','prefix','suffix','prepend'])
<x-input :borderless="$borderless" :shadowless="$shadowless" :label="$label" :hint="$hint" :corner-hint="$cornerHint" :icon="$icon" :right-icon="$rightIcon" :prefix="$prefix" :suffix="$suffix" :prepend="$prepend" {{ $attributes }}>
<x-slot name="append" >{{ $append }}</x-slot>
{{ $slot ?? "" }}
</x-input>