<div class="pb-3">
    <x-card color="bg-white" rounded="rounded-sm">
        <div class="flex">
            @include('templates.form.select',['label' => 'Rodzaj operacji','options' => $lists['operation_types'],'model' => 'forms.operation_type.value','width' => 20])
            @include('templates.form.select',['label' => 'Sukces','options' => $lists['success_types'],'model' => 'custom_forms.success.value','width' => 15])
            @include('templates.form.text',['label' => 'Fraza','model' => 'forms.phrase.value','width' => 20])
            <div class='mb-2 ml-2 mr-2 flex items-end justify-center pb-2'>
                <x-button primary icon="refresh" wire:click="resetForm()"/>
            </div>
        </div>
    </x-card>
</div>
