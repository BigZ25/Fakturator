<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Inputs\MaskableInput::class, ['label' => ''.e($label).'','mask' => '##-###']); ?>
<?php $component->withName('inputs.maskable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','value' => ''.e($value ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd)): ?>
<?php $component = $__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd; ?>
<?php unset($__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/postcode.blade.php ENDPATH**/ ?>