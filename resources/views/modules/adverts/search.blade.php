<div class="pb-3">
    <x-card color="bg-white" rounded="rounded-sm">
        <div class="flex">
            @include('templates.form.select',['label' => 'Status','options' => $lists['statuses'],'model' => 'forms.status.value','width' => 15])
            @include('templates.form.select',['label' => 'Status OLX','options' => $lists['olx_statuses'],'model' => 'forms.olx_status.value','width' => 15])
            @include('templates.form.text',['label' => 'Fraza','model' => 'forms.phrase.value','width' => 20])
            <div class='mb-2 ml-2 mr-2 flex items-end justify-center pb-2'>
                <x-button primary icon="refresh" wire:click="resetForm()"/>
            </div>
        </div>
    </x-card>
</div>
