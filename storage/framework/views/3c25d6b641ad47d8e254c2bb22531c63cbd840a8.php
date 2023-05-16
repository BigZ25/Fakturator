<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.delete')->html();
} elseif ($_instance->childHasBeenRendered('l3465864645-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3465864645-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3465864645-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3465864645-0');
} else {
    $response = \Livewire\Livewire::mount('templates.delete');
    $html = $response->html();
    $_instance->logRenderedChild('l3465864645-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div class="pb-3">
        <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['padding' => 'p-2','color' => 'bg-white','rounded' => 'rounded-sm']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('templates.buttons.edit',['route' => route('invoices.edit',$invoice->id), 'disabled' => $invoice->is_active || $invoice->is_in_queue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($invoice),'\\').'",'.$invoice->id.')'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.buttons.button',['label' => 'Pobierz PDF','color' => 'indigo','icon' => 'document-download','route' => route('invoices.pdf',$invoice->id),'blank' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.buttons.button',['label' => 'Wystaw podobną','color' => 'cyan','icon' => 'document-duplicate','route' => route('invoices.copy',$invoice->id)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(!$invoice->have_correction): ?>
                <?php echo $__env->make('templates.buttons.button',['label' => 'Wystaw korektę','color' => 'stone','icon' => 'document-add','route' => route('invoices.correction',$invoice->id)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('templates.buttons.button',['label' => 'Zobacz korektę','color' => 'sky','icon' => 'document','route' => route('invoices.show',$invoice->correction_invoice_id)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
    </div>
    <div class="flex pb-3">
        <div class="flex-1 pr-2">
            <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Podstawowe dane','color' => 'bg-white','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Numer','value' => $invoice->number], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Adres e-mail do wysyłki','value' => $invoice->send_email], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Data sprzedaży','value' => $invoice->sale_date], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Data wystawienia','value' => $invoice->issue_date], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Termin płatności','value' => $invoice->payment_date], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Zapłacono dnia','value' => $invoice->paid_date], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Metoda płatności','value' => $invoice->payment_method_name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Faktura wydrukowana','value' => $invoice->is_printed_text], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.row',['label' => 'Faktura wysłana','value' => $invoice->is_send_text], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.textarea',['label' => 'Notatki','value' => $invoice->notes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('templates.show.timestamp',['entity' => $invoice], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
        </div>
        <div x-data="tabs">
            <div class="grid grid-cols-3 cursor-pointer">
                <div :class="getClasses(1)" @click="setActive(1)">
                    <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane nabywcy</h3>
                </div>
                <div :class="getClasses(2)" @click="setActive(2)">
                    <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane odbiorcy</h3>
                </div>
            </div>
            <div>
                <div x-show="isActive(1)" x-transition:enter.duration.500ms>
                    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['style' => true]); ?>
                        <?php echo $__env->make('templates.company_data.show',['entity' => $invoice, 'prefix' => 'buyer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="flex flex-wrap">
                            <?php echo $__env->make('templates.show.row',['label' => 'Adres e-mail','value' => $invoice->send_email], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
                </div>
                <div x-show="isActive(2)" x-transition:enter.duration.500ms>
                    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                        <?php echo $__env->make('templates.company_data.show',['entity' => $invoice, 'prefix' => 'recipient'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($invoice->is_correction): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-show',['parentId' => $invoice->correctionParent->id,'box_title' => 'Pozycje na fakturze przed korektą'])->html();
} elseif ($_instance->childHasBeenRendered('l3465864645-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3465864645-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3465864645-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3465864645-1');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-show',['parentId' => $invoice->correctionParent->id,'box_title' => 'Pozycje na fakturze przed korektą']);
    $html = $response->html();
    $_instance->logRenderedChild('l3465864645-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-show',['parentId' => $invoice->id,'box_title' => $invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze'])->html();
} elseif ($_instance->childHasBeenRendered('l3465864645-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3465864645-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3465864645-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3465864645-2');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-show',['parentId' => $invoice->id,'box_title' => $invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze']);
    $html = $response->html();
    $_instance->logRenderedChild('l3465864645-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/invoices/show.blade.php ENDPATH**/ ?>