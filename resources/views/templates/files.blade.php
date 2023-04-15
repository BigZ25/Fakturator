<div>
    <div class="p-2">
        <label class="border border-indigo-600 p-1 rounded cursor-pointer my-6">
            <input type="file" class="sr-only" multiple name="files[]" accept="{{implode(", ",$allowed_extensions)}}" wire:model="files">
            <span>{{$allowed_extensions ? 'Wybierz pliki (' . implode(", ",$allowed_extensions) . ')' : 'Wybierz pliki'}}</span>
        </label>
    </div>
    @if(!empty($files))
        <div class="p-2">
            <label>Wybrane pliki:</label>
            <ul>
                @foreach($files as $file)
                    <li>{{$file->getClientOriginalName()}}
                        <a href="#" wire:click="removeFile({{$loop->index}})">
                            <i class="text-red-800 fa fa-fw fa-trash"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
