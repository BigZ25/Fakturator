<div class="pb-3">
    <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
        @foreach($buttons as $button)
            <x-button positive label="{{$button['label']}}" icon="{{$button['icon']}}" href="{{$button['route']}}"/>
        @endforeach
    </x-card>
</div>
