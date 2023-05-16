<div>
    <form method="POST" action="<?php echo e($invoice->id ? route('invoices.update',$invoice->id) : ($invoice->correctionParent ? route('invoices.store') . '?correction=' . $entity_id : route('invoices.store'))); ?>" enctype="multipart/form-data" class="ajax-form">
        <?php if($invoice->id): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="flex pb-3">
            <div class="flex-1 pr-2">
                <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Podstawowe dane','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    <div class="flex flex-wrap">
                        <?php echo $__env->make('templates.form.text',['width' => 50,'value' => $invoice->number,'name' => 'number', 'label' => 'Numer faktury'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('templates.form.select',['width' => 50,'value' => $invoice->payment_method,'name' => 'payment_method','label' => 'Metoda płatności','options' => $lists['payment_methods']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="flex flex-wrap">
                        <?php echo $__env->make('templates.form.date',['width' => 50,'value' => $invoice->sale_date,'name' => 'sale_date' ,'label' => 'Data sprzedaży'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('templates.form.date',['width' => 50,'value' => $invoice->issue_date ,'name' => 'issue_date','label' => 'Data wystawienia'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="flex flex-wrap">
                        <?php echo $__env->make('templates.form.date',['width' => 30,'value' => $invoice->payment_date,'name' => 'payment_date','label' => 'Termin płatności'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('templates.form.date',['width' => 30,'value' => $invoice->paid_date,'name' => 'paid_date','label' => 'Zapłacono dnia'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('templates.form.text',['width' => 40,'value' => $invoice->send_email,'name' => 'send_email' ,'label' => 'Adres e-mail do wysyłki'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="flex flex-wrap">
                        <?php echo $__env->make('templates.form.checkbox',['width' => 50,'value' => $invoice->is_printed,'name' => 'is_printed','label' => 'Faktura wydrukowana'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('templates.form.checkbox',['width' => 50,'value' => $invoice->is_send,'name' => 'is_send','label' => 'Faktura wysłana'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="flex flex-wrap">
                        <?php echo $__env->make('templates.form.textarea',['rows' => 5,'width' => 100,'value' => $invoice->notes,'name' => 'notes','label' => 'Notatki'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
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
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'buyer', 'datalist' => true])->html();
} elseif ($_instance->childHasBeenRendered('l2400764353-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2400764353-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2400764353-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2400764353-0');
} else {
    $response = \Livewire\Livewire::mount('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'buyer', 'datalist' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('l2400764353-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'recipient'])->html();
} elseif ($_instance->childHasBeenRendered('l2400764353-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2400764353-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2400764353-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2400764353-1');
} else {
    $response = \Livewire\Livewire::mount('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'recipient']);
    $html = $response->html();
    $_instance->logRenderedChild('l2400764353-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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
        <?php if($invoice->correctionParent): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-form',[$invoice->correctionParent->id,'Pozycje na fakturze przed korektą',true])->html();
} elseif ($_instance->childHasBeenRendered('l2400764353-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2400764353-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2400764353-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2400764353-2');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-form',[$invoice->correctionParent->id,'Pozycje na fakturze przed korektą',true]);
    $html = $response->html();
    $_instance->logRenderedChild('l2400764353-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-form',[$entity_id,$invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze'])->html();
} elseif ($_instance->childHasBeenRendered('l2400764353-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l2400764353-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2400764353-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2400764353-3');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.items.invoice-items-form',[$entity_id,$invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze']);
    $html = $response->html();
    $_instance->logRenderedChild('l2400764353-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if($invoice->id === null): ?>
            <?php echo $__env->make('templates.buttons.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('templates.buttons.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </form>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/invoices/form.blade.php ENDPATH**/ ?>