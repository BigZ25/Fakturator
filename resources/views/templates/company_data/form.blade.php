<div>
    <div class="flex flex-wrap">
        @include('templates.form.nip',['width' => 100,'value' => $entity->nip,'name' => 'name' ,'label' => 'NIP'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->name,'name' => 'name' ,'label' => 'Nazwa'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->name,'name' => 'address' ,'label' => 'Adres'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.postcode',['width' => 100,'value' => $entity->name,'name' => 'postcode' ,'label' => 'Kod pocztowy'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $entity->name,'name' => 'city' ,'label' => 'Miasto'])
    </div>
</div>
