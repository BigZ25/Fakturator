<div>
    <form method="POST" action="<?php echo e($product->id ? route('products.update',$product->id) : route('products.store')); ?>" enctype="multipart/form-data" class="ajax-form">
        <?php if($product->id): ?>
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
                <div class="flex flex-wrap">
                    <?php echo $__env->make('templates.form.text',['width' => 30,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.select',['width' => 15,'value' => $product->unit,'name' => 'unit' ,'label' => 'Jednostka','options' => $lists['units']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.text',['width' => 20,'value' => $product->quantity,'name' => 'quantity' ,'label' => 'Ilość'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.select',['width' => 15,'value' => $product->vat_type,'name' => 'vat_type' ,'label' => 'Stawka VAT','options' => $lists['vat_types']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.text',['width' => 20,'value' => $product->price,'name' => 'price' ,'label' => 'Cena'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
        </div>
        <?php if($product->id === null): ?>
            <?php echo $__env->make('templates.buttons.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('templates.buttons.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </form>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/products/form.blade.php ENDPATH**/ ?>