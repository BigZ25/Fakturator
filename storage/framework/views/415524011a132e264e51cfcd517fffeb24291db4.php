<div>
    <?php if($datalist === true): ?>
        <?php echo $__env->make('templates.form.hidden',['name' => $prefix.'customer_id','value' => $data['customer_id'],'model' => 'data.customer_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="flex flex-wrap">
        <?php echo $__env->make('templates.form.nip',['width' => 100,'value' => $data['nip'],'name' => $prefix.'nip' ,'label' => 'NIP','model' => 'data.nip'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex flex-wrap">
        <?php echo $__env->make('templates.company_data.partials.name_input',['width' => 100,'value' => $data['name'],'name' => $prefix.'name' ,'label' => 'Nazwa','model' => 'data.name', 'datalist' => $datalist, 'options' => $lists['customers']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex flex-wrap">
        <?php echo $__env->make('templates.form.text',['width' => 100,'value' => $data['address'],'name' => $prefix.'address' ,'label' => 'Adres','model' => 'data.address'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex flex-wrap">
        <?php echo $__env->make('templates.form.postcode',['width' => 100,'value' => $data['postcode'],'name' => $prefix.'postcode' ,'label' => 'Kod pocztowy','model' => 'data.postcode'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex flex-wrap">
        <?php echo $__env->make('templates.form.text',['width' => 100,'value' => $data['city'],'name' => $prefix.'city' ,'label' => 'Miasto','model' => 'data.city'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/company_data/form.blade.php ENDPATH**/ ?>