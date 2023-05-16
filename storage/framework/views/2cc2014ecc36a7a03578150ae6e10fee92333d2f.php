<div>
    <?php if ($__env->exists(data_get($setUp, 'header.includeViewOnTop'))) echo $__env->make(data_get($setUp, 'header.includeViewOnTop'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="md:flex md:flex-row w-full justify-between items-center">
        <div class="md:flex md:flex-row w-full">
            <div>
                <?php echo $__env->make(powerGridThemeRoot().'.header.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="flex flex-row justify-center items-center text-sm">
                <?php if(data_get($setUp, 'exportable')): ?>
                    <div class="mr-2 mt-2 sm:mt-0" id="pg-header-export">
                        <?php echo $__env->make(powerGridThemeRoot().'.header.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                <?php if ($__env->exists(powerGridThemeRoot().'.header.toggle-columns')) echo $__env->make(powerGridThemeRoot().'.header.toggle-columns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists(powerGridThemeRoot().'.header.soft-deletes')) echo $__env->make(powerGridThemeRoot().'.header.soft-deletes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make(powerGridThemeRoot().'.header.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make(powerGridThemeRoot().'.header.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <?php echo $__env->make(powerGridThemeRoot().'.header.batch-exporting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make(powerGridThemeRoot().'.header.enabled-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if ($__env->exists(data_get($setUp, 'header.includeViewOnBottom'))) echo $__env->make(data_get($setUp, 'header.includeViewOnBottom'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists(powerGridThemeRoot().'.header.message-soft-deletes')) echo $__env->make(powerGridThemeRoot().'.header.message-soft-deletes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header.blade.php ENDPATH**/ ?>