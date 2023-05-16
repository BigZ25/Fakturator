<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('modal')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => $attributes,'spacing' => $fullscreen ? '' : $spacing,'z-index' => $zIndex,'max-width' => $maxWidth,'align' => $align,'blur' => $blur]); ?>
    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('card')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => $title,'rounded' => $squared || $fullscreen ? '' : $rounded,'card-classes' => $fullscreen ? 'min-h-screen' : '','shadow' => $shadow,'padding' => $padding,'divider' => $divider]); ?>
        <?php if($header): ?>
             <?php $__env->slot('header', null, []); ?> 
                <?php echo e($header); ?>

             <?php $__env->endSlot(); ?>
        <?php elseif(!$hideClose): ?>
             <?php $__env->slot('action', null, []); ?> 
                <button class="focus:outline-none p-1 focus:ring-2 focus:ring-secondary-200 rounded-full text-secondary-300"
                        x-on:click="close">
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => WireUiComponent::resolve('icon')]); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'x','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                </button>
             <?php $__env->endSlot(); ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        <?php if(isset($footer)): ?>
             <?php $__env->slot('footer', null, []); ?> 
                <?php echo e($footer); ?>

             <?php $__env->endSlot(); ?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/modal-card.blade.php ENDPATH**/ ?>