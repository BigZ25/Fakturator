<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginal564a4896eb76cc73ef6ff5c2eb252e021a1928a2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\BinaryCheckbox::class, ['label' => ''.e($label).'','value' => ''.e($value ?? 0).'']); ?>
<?php $component->withName('binary-checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal564a4896eb76cc73ef6ff5c2eb252e021a1928a2)): ?>
<?php $component = $__componentOriginal564a4896eb76cc73ef6ff5c2eb252e021a1928a2; ?>
<?php unset($__componentOriginal564a4896eb76cc73ef6ff5c2eb252e021a1928a2); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/checkbox.blade.php ENDPATH**/ ?>