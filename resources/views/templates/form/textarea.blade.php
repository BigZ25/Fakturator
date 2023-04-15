<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-textarea rows="{{$rows ?? 20}}" label="{{$label}}" name="{{$name ?? ''}}" wire:model="{{$model ?? ''}}">
    </x-textarea>
    @if(isset($name) && isset($value))
        <script>
            $(document).ready(function () {
                $('textarea[name="{{$name}}"]').val({!! json_encode($value) !!})
            });
        </script>
    @endif
</div>
