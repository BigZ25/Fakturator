<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Inputs\MaskableInput::class, ['label' => ''.e($label).'','mask' => '#############']); ?>
<?php $component->withName('inputs.maskable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','value' => ''.e($value ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
         <?php $__env->slot('append', null, []); ?> 
            <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, []); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-full rounded-r-md fa fa-search primary flat squared','wire:click' => 'searchByNIP()']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd)): ?>
<?php $component = $__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd; ?>
<?php unset($__componentOriginalf3c451f02d757aff8045507451f81ba08a4837dd); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/nip.blade.php ENDPATH**/ ?>