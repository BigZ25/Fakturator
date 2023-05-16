<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes = $attributes->exceptProps(['label','hasError']); ?>
<?php foreach (array_filter((['label','hasError']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal9a6b07ac9565d5de41080e822a6c07bd8f97f16c = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Label::class, ['label' => $label,'hasError' => $hasError]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a6b07ac9565d5de41080e822a6c07bd8f97f16c)): ?>
<?php $component = $__componentOriginal9a6b07ac9565d5de41080e822a6c07bd8f97f16c; ?>
<?php unset($__componentOriginal9a6b07ac9565d5de41080e822a6c07bd8f97f16c); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/d6275bfb46ac42f384c4183a2b25fe614086145a.blade.php ENDPATH**/ ?>