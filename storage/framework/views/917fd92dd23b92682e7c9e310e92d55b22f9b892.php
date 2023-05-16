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
<?php if (isset($component)) { $__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Icon::class, ['name' => $name]); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e)): ?>
<?php $component = $__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e; ?>
<?php unset($__componentOriginal598edb8733fe6049390ef266acfe4f813b506a7e); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/87f0c69779a9f971fd4c9d08cba8909dfdd0b26c.blade.php ENDPATH**/ ?>