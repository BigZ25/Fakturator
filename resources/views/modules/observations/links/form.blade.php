<div class="pb-3">
    <x-card title="Linki" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
        @if(count($items) > 0)
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <table class="w-full table-auto text-left border">
                        <thead>
                        <tr>
                            @include('templates.table.show.th',['label' => "Serwis",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Link",'align' => 'center'])
                        </tr>
                        </thead>
                        <tbody class="border">
                        @foreach($items as $index => $item)
                            <tr>
                                @include('templates.table.form.select',['name' => 'links['.$index.'][website]','value' => $item['website'],'options' => $lists['websites'],'width' => 30])
                                @include('templates.table.form.text',['name' => 'links['.$index.'][input_link]','model' => 'items.'.$index.'.input_link','width' => 70])
                                @include('templates.table.form.remove',['index' => $index])
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <p>Brak linków</p>
                </div>
            </div>
        @endif
        <div class="flex flex-wrap">
            <div class="mb-2 ml-2 mr-2" style="width: 100%">
                @include('templates.buttons.button',['color' => 'positive', 'label' => 'Nowy link','icon' => 'plus','action' => 'addItem()'])
            </div>
        </div>
    </x-card>
</div>
