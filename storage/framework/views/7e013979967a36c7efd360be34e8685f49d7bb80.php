<div class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginal69a9c744e68df4c35a51e4c2ff24cf932de1a6db = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\MySelect::class, ['label' => ''.e($label).'','placeholder' => ''.e($placeholder ?? 'Wybierz').'','options' => $options,'optionLabel' => 'text','optionValue' => 'id','value' => ''.e($value ?? null).'','model' => ($model ?? false) ? true : false]); ?>
<?php $component->withName('my-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? null).'','wire:model' => ''.e($model ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69a9c744e68df4c35a51e4c2ff24cf932de1a6db)): ?>
<?php $component = $__componentOriginal69a9c744e68df4c35a51e4c2ff24cf932de1a6db; ?>
<?php unset($__componentOriginal69a9c744e68df4c35a51e4c2ff24cf932de1a6db); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/select.blade.php ENDPATH**/ ?>