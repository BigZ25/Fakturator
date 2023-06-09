<?php
    $hasError = false;
    if ($name) { $hasError = $errors->has($name) && !$errorless; }
?>

<div class="<?php if($disabled): ?> opacity-60 <?php endif; ?>">
    <?php if($label || $cornerHint): ?>
        <div class="flex <?php echo e(!$label && $cornerHint ? 'justify-end' : 'justify-between'); ?> mb-1">
            <?php if($label): ?>
                <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('label')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => $label,'has-error' => $hasError,'for' => $id]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($cornerHint): ?>
                <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('label')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => $cornerHint,'has-error' => $hasError,'for' => $id]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="relative rounded-md <?php if (! ($shadowless)): ?> shadow-sm <?php endif; ?>">
        <?php if($prefix || $icon): ?>
            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none
                <?php echo e($hasError ? 'text-negative-500' : 'text-secondary-400'); ?>">
                <?php if($icon): ?>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('icon')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => $icon,'class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php elseif($prefix): ?>
                    <span class="pl-1 flex items-center self-center">
                        <?php echo e($prefix); ?>

                    </span>
                <?php endif; ?>
            </div>
        <?php elseif($prepend): ?>
            <?php echo e($prepend); ?>

        <?php endif; ?>

        <input <?php echo e($attributes->class([
                $getInputClasses($hasError),
            ])->merge([
                'type'         => 'text',
                'autocomplete' => 'off',
            ])); ?> />

        <?php if($suffix || $rightIcon || ($hasError && !$append)): ?>
            <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none
                <?php echo e($hasError ? 'text-negative-500' : 'text-secondary-400'); ?>">
                <?php if($rightIcon): ?>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('icon')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => $rightIcon,'class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php elseif($suffix): ?>
                    <span class="pr-1 flex items-center justify-center">
                        <?php echo e($suffix); ?>

                    </span>
                <?php elseif($hasError): ?>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('icon')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'exclamation-circle','class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        <?php elseif($append): ?>
            <?php echo e($append); ?>

        <?php endif; ?>
    </div>

    <?php if(!$hasError && $hint): ?>
        <label <?php if($id): ?> for="<?php echo e($id); ?>" <?php endif; ?> class="mt-2 text-sm text-secondary-500 dark:text-secondary-400">
            <?php echo e($hint); ?>

        </label>
    <?php endif; ?>

    <?php if($name && !$errorless): ?>
        <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('error')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => $name]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/input.blade.php ENDPATH**/ ?>