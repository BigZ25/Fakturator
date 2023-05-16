<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.delete')->html();
} elseif ($_instance->childHasBeenRendered('l4283801347-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4283801347-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4283801347-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4283801347-0');
} else {
    $response = \Livewire\Livewire::mount('templates.delete');
    $html = $response->html();
    $_instance->logRenderedChild('l4283801347-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
            <?php echo $__env->make('templates.buttons.edit',['route' => route('customers.edit',$customer->id), 'disabled' => $customer->is_active || $customer->is_in_queue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($customer),'\\').'",'.$customer->id.')'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
    </div>
    <div class="pb-3">
        <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Podstawowe dane','color' => 'bg-white','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('templates.company_data.show',['entity' => $customer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.timestamp',['entity' => $customer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.invoices-index',['inject' => true,'buyer_customer_id' => $customer->id])->html();
} elseif ($_instance->childHasBeenRendered('l4283801347-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l4283801347-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4283801347-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4283801347-1');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.invoices-index',['inject' => true,'buyer_customer_id' => $customer->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l4283801347-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/customers/show.blade.php ENDPATH**/ ?>