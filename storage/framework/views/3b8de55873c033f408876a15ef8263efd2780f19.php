<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes = $attributes->exceptProps(['spacing','zIndex','maxWidth','align','blur']); ?>
<?php foreach (array_filter((['spacing','zIndex','maxWidth','align','blur']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalb4c7819213ce5ef46ffe1ece040f02e136079df9 = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Modal::class, ['spacing' => $spacing,'zIndex' => $zIndex,'maxWidth' => $maxWidth,'align' => $align,'blur' => $blur]); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4c7819213ce5ef46ffe1ece040f02e136079df9)): ?>
<?php $component = $__componentOriginalb4c7819213ce5ef46ffe1ece040f02e136079df9; ?>
<?php unset($__componentOriginalb4c7819213ce5ef46ffe1ece040f02e136079df9); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/08f1b073f533457fb7d47a9cdd9fbbaa4206a860.blade.php ENDPATH**/ ?>