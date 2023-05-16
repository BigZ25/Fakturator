<td class="text-center align-middle">
    <a href="#!" wire:click="removeItem(<?php echo e($index); ?>)"><?php if (isset($component)) { $__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Icon::class, ['name' => 'x-circle']); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-red-500 w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e)): ?>
<?php $component = $__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e; ?>
<?php unset($__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e); ?>
<?php endif; ?></a>
</td>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/table/form/remove.blade.php ENDPATH**/ ?>