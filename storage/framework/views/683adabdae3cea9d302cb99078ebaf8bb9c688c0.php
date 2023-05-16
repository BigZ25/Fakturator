<div class="<?php if($disabled): ?> opacity-60 <?php endif; ?>">
    <?php if($label): ?>
        <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('label')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-1','label' => $label,'has-error' => $errors->has($name),'for' => $id]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
    <?php endif; ?>
    <select <?php echo e($attributes->class([
        $defaultClasses(),
        $errorClasses() =>  $errors->has($name),
        $colorClasses() => !$errors->has($name),
    ])); ?>>
        <?php if($options !== null): ?>
            <?php if($placeholder): ?>
                <option value=""><?php echo e($placeholder); ?></option>
            <?php endif; ?>

            <?php $__empty_1 = true; $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <option value="<?php echo e($getOptionValue($key, $option)); ?>" <?php if(!$model && $getOptionValue($key, $option) == $value): ?> selected <?php endif; ?>
                <?php if(data_get($option, 'disabled', false)): ?> disabled <?php endif; ?>>
                    <?php echo e($getOptionLabel($key, $option)); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <option disabled>
                    <?php echo app('translator')->get('wireui::messages.empty_options'); ?>
                </option>
            <?php endif; ?>
        <?php else: ?> <?php echo e($slot); ?> <?php endif; ?>
    </select>

    <?php if($name): ?>
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
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/my-select.blade.php ENDPATH**/ ?>