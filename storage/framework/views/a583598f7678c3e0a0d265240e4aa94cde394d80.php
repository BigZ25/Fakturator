<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\MyInput::class, ['datalist' => ''.e($datalist ?? false).'','options' => $options ?? [],'label' => ''.e($label).'']); ?>
<?php $component->withName('my-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','value' => ''.e($value ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb)): ?>
<?php $component = $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb; ?>
<?php unset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/text.blade.php ENDPATH**/ ?>