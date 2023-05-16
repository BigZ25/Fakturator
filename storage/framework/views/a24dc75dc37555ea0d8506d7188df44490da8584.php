<label <?php echo e($attributes->class([
        'block text-sm font-medium',
        'text-negative-600'  =>  $hasError,
        'text-secondary-700 dark:text-gray-400' => !$hasError,
    ])); ?>>
    <?php echo e($label ?? $slot); ?>

</label>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/label.blade.php ENDPATH**/ ?>