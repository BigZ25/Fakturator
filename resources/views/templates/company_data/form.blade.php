<div>
    @if($datalist === true)
        @include('templates.form.hidden',['name' => $prefix.'customer_id','value' => $data['customer_id'],'model' => 'data.customer_id'])
    @endif
    <div class="flex flex-wrap">
        @include('templates.form.nip',['width' => 100,'value' => $data['nip'],'name' => $prefix.'nip' ,'label' => 'NIP','model' => 'data.nip'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.company_data.partials.name_input',['width' => 100,'value' => $data['name'],'name' => $prefix.'name' ,'label' => 'Nazwa','model' => 'data.name', 'datalist' => $datalist, 'options' => $lists['customers']])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $data['address'],'name' => $prefix.'address' ,'label' => 'Adres','model' => 'data.address'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.postcode',['width' => 100,'value' => $data['postcode'],'name' => $prefix.'postcode' ,'label' => 'Kod pocztowy','model' => 'data.postcode'])
    </div>

    <div class="flex flex-wrap">
        @include('templates.form.text',['width' => 100,'value' => $data['city'],'name' => $prefix.'city' ,'label' => 'Miasto','model' => 'data.city'])
    </div>
</div>
