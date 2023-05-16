<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginal2408ce440701d8248f12f9da99e3ff4e473fd8b0 = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Textarea::class, ['label' => ''.e($label).'']); ?>
<?php $component->withName('textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['rows' => ''.e($rows ?? 20).'','name' => ''.e($name ?? '').'','wire:model' => ''.e($model ?? '').'']); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2408ce440701d8248f12f9da99e3ff4e473fd8b0)): ?>
<?php $component = $__componentOriginal2408ce440701d8248f12f9da99e3ff4e473fd8b0; ?>
<?php unset($__componentOriginal2408ce440701d8248f12f9da99e3ff4e473fd8b0); ?>
<?php endif; ?>
    <?php if(isset($name) && isset($value)): ?>
        <script>
            $(document).ready(function () {
                $('textarea[name="<?php echo e($name); ?>"]').val(<?php echo json_encode($value); ?>)
            });
        </script>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/textarea.blade.php ENDPATH**/ ?>