<?php if(isset($title)): ?>
    <div class="pb-3">
        <h1 class="text-2xl"><?php echo e($title); ?></h1>
        <?php if(isset($breadcrumbs) && $breadcrumbs): ?>
            <h1 class="mt-1"><a class="hover:text-primary-500" href="<?php echo e($breadcrumbs['route']); ?>"><u><?php echo e($breadcrumbs['label']); ?></u></a></h1>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/header.blade.php ENDPATH**/ ?>