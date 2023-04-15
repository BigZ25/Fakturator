<div>
    <label for="{{ $id }}" class="flex items-center {{ $errors->has($name) ? 'text-negative-600':'' }}">
        @if ($leftLabel)
            <x-dynamic-component
                :component="WireUiComponent::resolve('label')"
                class="mr-2"
                :for="$id"
                :label="$leftLabel"
                :has-error="$errors->has($name)"
            />
        @endif

        <input type="hidden" name="{{$name}}" value="0">
        <input
            @if($value === 1)
            checked
            @endif
            value="1"
            {{ $attributes->class([$getClasses($errors->has($name)),])->merge(['type'  => 'checkbox']) }}
        />

        @if ($label)
            <x-dynamic-component
                :component="WireUiComponent::resolve('label')"
                class="ml-2"
                :for="$id"
                :label="$label"
                :has-error="$errors->has($name)"
            />
        @endif
    </label>

    @if ($name)
        <x-dynamic-component
            :component="WireUiComponent::resolve('error')"
            :name="$name"
        />
    @endif
</div>
