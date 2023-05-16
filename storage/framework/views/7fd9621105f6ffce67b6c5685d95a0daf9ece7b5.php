<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes = $attributes->exceptProps(['label']); ?>
<?php foreach (array_filter((['label']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['label' => $label]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\fakturator\storage\framework\views/306d9f33c34974b9f90c53e49d513676bcba6fba.blade.php ENDPATH**/ ?>