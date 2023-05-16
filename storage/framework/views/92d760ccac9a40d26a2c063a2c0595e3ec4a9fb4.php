<div class="w-full flex flex-col <?php echo e($shadow); ?> <?php echo e($rounded); ?> <?php echo e($color); ?> <?php echo e($cardClasses); ?>">
    <?php if($header): ?>
        <?php echo e($header); ?>

    <?php elseif($title || $action): ?>
        <div class="px-4 py-2.5 flex justify-between items-center border-b dark:border-0 card-title">
            <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal"><?php echo e($title); ?></h3>

            <?php if($action): ?>
                <?php echo e($action); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div <?php echo e($attributes->merge(['class' => "{$padding} text-secondary-700 dark:text-secondary-400 grow card-content"])); ?>>
        <?php echo e($slot); ?>

    </div>

    <?php if($footer): ?>
        <div class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none dark:bg-secondary-800
                    border-t dark:border-secondary-600 card-footer <?php echo e($rounded); ?>">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/wireui/components/card.blade.php ENDPATH**/ ?>