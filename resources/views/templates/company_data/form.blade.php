<div>
    <div class="flex flex-wrap">
        @include('templates.form.nip',['width' => 100,'value' => $entity->nip,'name' => 'nip' ,'label' => 'NIP','model' => 'data.nip'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->name,'name' => 'name' ,'label' => 'Nazwa','model' => 'data.name'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->address,'name' => 'address' ,'label' => 'Adres','model' => 'data.address'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.postcode',['width' => 100,'value' => $entity->postcode,'name' => 'postcode' ,'label' => 'Kod pocztowy','model' => 'data.postcode'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->city,'name' => 'city' ,'label' => 'Miasto','model' => 'data.city'])
    </div>
</div>
