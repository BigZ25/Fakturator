<div style="width: 50%">
    <form method="POST" action="<?php echo e($customer->id ? route('customers.update',$customer->id) : route('customers.store')); ?>" enctype="multipart/form-data" class="ajax-form">
        <?php if($customer->id): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="pb-3">
            <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Podstawowe dane','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.company-data',['entity' => $customer])->html();
} elseif ($_instance->childHasBeenRendered('l3201940231-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3201940231-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3201940231-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3201940231-0');
} else {
    $response = \Livewire\Livewire::mount('templates.company-data',['entity' => $customer]);
    $html = $response->html();
    $_instance->logRenderedChild('l3201940231-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

        <?php if($customer->id === null): ?>
            <?php echo $__env->make('templates.buttons.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('templates.buttons.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </form>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/customers/form.blade.php ENDPATH**/ ?>