<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if(isset($value)): ?>
        <?php if (isset($component)) { $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Input::class, ['label' => ''.e($label).'']); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'password','name' => ''.e($name).'','value' => ''.e($value).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a)): ?>
<?php $component = $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a; ?>
<?php unset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a); ?>
<?php endif; ?>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Input::class, ['label' => ''.e($label).'']); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'password','name' => ''.e($name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a)): ?>
<?php $component = $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a; ?>
<?php unset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/password.blade.php ENDPATH**/ ?>