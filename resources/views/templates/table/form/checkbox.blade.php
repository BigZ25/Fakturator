<td class="text-{{$align ?? 'center'}}">
    <x-checkbox wire:model="checkboxes.{{$id}}.value" wire:click="clickCheckbox({{$id}},{{$value}})"/>
    @if(isset($model))
        @error($model) <span class="small text-danger">{{ $message }}</span> @enderror
    @endif
</td>
