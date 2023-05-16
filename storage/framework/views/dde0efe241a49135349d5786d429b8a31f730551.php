<?php if(isset($multiple)): ?>
    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input multiple type="<?php echo e($type ?? 'text'); ?>" name=<?php echo e($name); ?> value="<?php echo e($value); ?>" style="display: none">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <input type="<?php echo e($type ?? 'text'); ?>" name=<?php echo e($name); ?> value="<?php echo e($value); ?>" style="display: none">
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/hidden.blade.php ENDPATH**/ ?>