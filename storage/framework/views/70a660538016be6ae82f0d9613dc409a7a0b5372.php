<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes = $attributes->exceptProps(['borderless','shadowless','label','hint','cornerHint','icon','rightIcon','prefix','suffix','prepend']); ?>
<?php foreach (array_filter((['borderless','shadowless','label','hint','cornerHint','icon','rightIcon','prefix','suffix','prepend']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Input::class, ['borderless' => $borderless,'shadowless' => $shadowless,'label' => $label,'hint' => $hint,'cornerHint' => $cornerHint,'icon' => $icon,'rightIcon' => $rightIcon,'prefix' => $prefix,'suffix' => $suffix,'prepend' => $prepend]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
 <?php $__env->slot('append', null, []); ?> <?php echo e($append); ?> <?php $__env->endSlot(); ?>
<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a)): ?>
<?php $component = $__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a; ?>
<?php unset($__componentOriginalc0a351f3c0423aeafa2f19c5e8604c5318708f8a); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/5933320da4e8e0912d869d71aa8b754076363d05.blade.php ENDPATH**/ ?>