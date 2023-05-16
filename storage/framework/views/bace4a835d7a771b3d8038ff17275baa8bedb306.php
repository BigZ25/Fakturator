<div x-data="wireui_inputs_maskable({
    isLazy: <?= json_encode(filter_var($attributes->wire('model')->hasModifier('lazy'), FILTER_VALIDATE_BOOLEAN)); ?>,
    model: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?>,
    emitFormatted: <?= json_encode(filter_var($emitFormatted, FILTER_VALIDATE_BOOLEAN)); ?>,
    mask: <?php echo e($mask); ?>,
})" <?php echo e($attributes->only('wire:key')); ?>>
    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('input')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['borderless' => $borderless,'shadowless' => $shadowless,'label' => $label,'hint' => $hint,'corner-hint' => $cornerHint,'icon' => $icon,'right-icon' => $rightIcon,'prefix' => $prefix,'suffix' => $suffix,'prepend' => $prepend,'x-model' => 'input','x-on:input' => 'onInput($event.target.value)','x-on:blur' => 'emitInput','attributes' => $attributes->whereDoesntStartWith(['wire:model', 'x-model', 'wire:key'])]); ?>
        <?php if(isset($append)): ?>
             <?php $__env->slot('append', null, []); ?> 
                <?php echo e($append); ?>

             <?php $__env->endSlot(); ?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/inputs/maskable.blade.php ENDPATH**/ ?>