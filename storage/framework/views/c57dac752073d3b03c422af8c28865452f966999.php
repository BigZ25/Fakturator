<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes = $attributes->exceptProps(['name']); ?>
<?php foreach (array_filter((['name']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal19893f8643cdf487b0ca1de7b205dd7c0c4e7b4b = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Error::class, ['name' => $name]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19893f8643cdf487b0ca1de7b205dd7c0c4e7b4b)): ?>
<?php $component = $__componentOriginal19893f8643cdf487b0ca1de7b205dd7c0c4e7b4b; ?>
<?php unset($__componentOriginal19893f8643cdf487b0ca1de7b205dd7c0c4e7b4b); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/7405877b037665d3e5f5ff11b8d0e688ddab1007.blade.php ENDPATH**/ ?>