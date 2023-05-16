<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginale4905db69580428002f3907ecfff1cba8c5efbf6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\MyDatetimePicker::class, ['withoutTime' => 'true','label' => ''.e($label).'','value' => $value ?? null,'displayFormat' => 'YYYY-MM-DD']); ?>
<?php $component->withName('my-datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4905db69580428002f3907ecfff1cba8c5efbf6)): ?>
<?php $component = $__componentOriginale4905db69580428002f3907ecfff1cba8c5efbf6; ?>
<?php unset($__componentOriginale4905db69580428002f3907ecfff1cba8c5efbf6); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/date.blade.php ENDPATH**/ ?>