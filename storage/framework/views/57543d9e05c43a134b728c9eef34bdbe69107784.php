<?php if(!isset($disabled) || (isset($disabled) && $disabled === false)): ?>
    <?php if(isset($route)): ?>
        <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['color' => ''.e($color).'','label' => ''.e($label).'','icon' => ''.e($icon).'','href' => ''.e($route).'']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['target' => ''.e(isset($blank) && $blank === true ? '_blank' : '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(isset($action)): ?>
        <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['color' => ''.e($color).'','label' => ''.e($label).'','icon' => ''.e($icon).'']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => ''.e($action).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['color' => ''.e($color).'','label' => ''.e($label).'','icon' => ''.e($icon).'']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/buttons/button.blade.php ENDPATH**/ ?>