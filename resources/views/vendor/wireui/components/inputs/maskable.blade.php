<div x-data="wireui_inputs_maskable({
    isLazy: @boolean($attributes->wire('model')->hasModifier('lazy')),
    model: @entangle($attributes->wire('model')),
    emitFormatted: @boolean($emitFormatted),
    mask: {{ $mask }},
})" {{ $attributes->only('wire:key') }}>
    <x-dynamic-component
        :component="WireUiComponent::resolve('input')"
        :borderless="$borderless"
        :shadowless="$shadowless"
        :label="$label"
        :hint="$hint"
        :corner-hint="$cornerHint"
        :icon="$icon"
        :right-icon="$rightIcon"
        :prefix="$prefix"
        :suffix="$suffix"
        :prepend="$prepend"
        x-model="input"
        x-on:input="onInput($event.target.value)"
        x-on:blur="emitInput"
        {{ $attributes->whereDoesntStartWith(['wire:model', 'x-model', 'wire:key']) }}
    >
        @if(isset($append))
            <x-slot name="append">
                {{ $append }}
            </x-slot>
        @endif
    </x-dynamic-component>
</div>
