<?php if(isset($route)): ?>
    <p><?php if(isset($label)): ?><b><?php echo e($label); ?>: </b><?php endif; ?><a href="<?php echo e($route); ?>" onMouseOver="this.style.color='dodgerblue'" onMouseOut="this.style.color='black'"><?php echo e($value); ?></a></p>
<?php else: ?>
    <p><?php if(isset($label)): ?><b><?php echo e($label); ?>: </b><?php endif; ?><?php echo e($value ?? "-"); ?></p>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/show/row.blade.php ENDPATH**/ ?>