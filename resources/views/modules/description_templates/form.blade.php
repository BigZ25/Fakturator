<div>
    <form method="POST" action="{{route('description_template.store')}}" class="ajax-form">
        @csrf
        <div class="pb-3">
            <x-card color="bg-white flex" rounded="rounded-sm">
                <div class="flex flex-wrap">
                    @include('templates.form.textarea',['width' => 100,'value' => $descriptionTemplate->text,'name' => 'text', 'label' => 'Treść'])
                </div>
                <div class="flex flex-wrap">
                    <div class="mb-2 ml-2 mr-2" style="width: 100%">
                        <p>Parametry należy umieszczać w znakach <></p>
                        <br>
                        <p>Dostępne parametry:</p>
                        <table class="w-full table-auto text-left border">
                            <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Opis</th>
                            </tr>
                            </thead>
                            @foreach($parameters as $parameter)
                                <tr>
                                    @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $parameter['text']]]])
                                    @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $parameter['translation']]]])
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </x-card>
        </div>
        @include('templates.buttons.update')
    </form>
</div>
