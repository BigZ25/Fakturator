<?php if(isset($title)): ?>
    <div class="flex items-start">
        <div class="pb-3" style="width: 50%">
            <h1 class="text-2xl"><?php echo e($title); ?></h1>
            <?php if(isset($breadcrumbs) && $breadcrumbs): ?>
                <h1 class="mt-1"><a class="hover:text-primary-500" href="<?php echo e($breadcrumbs['route']); ?>"><u><?php echo e($breadcrumbs['label']); ?></u></a></h1>
            <?php endif; ?>
        </div>
        <div class="pb-3 mt-2" style="width: 50%; text-align: right">
            <a href="<?php echo e(route('settings.form')); ?>"><i class="fas fa-fw fa-user mr-1"></i><?php echo e(auth()->user()->email); ?></a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/header.blade.php ENDPATH**/ ?>