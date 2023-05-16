<?php $helperClass = app('PowerComponents\LivewirePowerGrid\Helpers\Helpers'); ?>
<div class="w-full md:w-auto">
    <div class="flex flex-wrap gap-2 mr-2">
        <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="w-full min-[370px]:!w-[calc(50%-4px)] sm:!w-[calc(33%-4px)] md:!w-auto">
                <?php echo $__env->renderWhen($action->can, 'livewire-powergrid::components.actions-header', [
                    'action' => $action
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/actions.blade.php ENDPATH**/ ?>