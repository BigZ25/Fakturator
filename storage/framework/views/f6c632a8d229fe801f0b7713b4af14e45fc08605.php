<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.delete')->html();
} elseif ($_instance->childHasBeenRendered('l3103477525-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3103477525-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3103477525-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3103477525-0');
} else {
    $response = \Livewire\Livewire::mount('templates.delete');
    $html = $response->html();
    $_instance->logRenderedChild('l3103477525-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
            <?php echo $__env->make('templates.buttons.edit',['route' => route('products.edit',$product->id), 'disabled' => $product->is_active || $product->is_in_queue], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($product),'\\').'",'.$product->id.')'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('templates.show.row',['label' => 'Nazwa','value' => $product->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.row',['label' => 'Jednostka','value' => $product->unit_name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.row',['label' => 'Ilość','value' => $product->quantity], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.row',['label' => 'Stawka VAT','value' => $product->vat_type_name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.row',['label' => 'Cena','value' => formatPriceShow($product->price)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('templates.show.timestamp',['entity' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modules.invoices.invoices-index',['inject' => true,'product_id' => $product->id])->html();
} elseif ($_instance->childHasBeenRendered('l3103477525-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3103477525-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3103477525-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3103477525-1');
} else {
    $response = \Livewire\Livewire::mount('modules.invoices.invoices-index',['inject' => true,'product_id' => $product->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l3103477525-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/products/show.blade.php ENDPATH**/ ?>