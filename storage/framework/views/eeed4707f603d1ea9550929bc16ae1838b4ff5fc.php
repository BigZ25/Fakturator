<div>
    <?php if ($__env->exists(data_get($setUp, 'footer.includeViewOnTop'))) echo $__env->make(data_get($setUp, 'footer.includeViewOnTop'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'justify-between' => data_get($setUp, 'footer.perPage'),
        'justify-end'  => blank(data_get($setUp, 'footer.perPage')),
        'md:flex md:flex-row w-full items-center pt-3 bg-white overflow-y-auto pl-2 pr-2 pb-1 relative
         dark:bg-slate-700' => blank(data_get($setUp, 'footer.pagination')),
]) ?>">
        <?php if(data_get($setUp, 'footer.perPage') && count(data_get($setUp, 'footer.perPageValues')) > 1 && blank(data_get($setUp, 'footer.pagination'))): ?>
            <div class="flex flex-row justify-center md:justify-start mb-2 md:mb-0">
                <div class="relative h-10">
                    <select wire:model.lazy="setUp.footer.perPage"
                            class="block appearance-none bg-slate-50 border border-slate-300 text-slate-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-slate-500  dark:bg-slate-600 dark:text-slate-200 dark:placeholder-slate-200 dark:border-slate-500">
                        <?php $__currentLoopData = data_get($setUp, 'footer.perPageValues'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>">
                                <?php if($value == 0): ?>
                                    <?php echo e(trans('livewire-powergrid::datatable.labels.all')); ?>

                                <?php else: ?>
                                    <?php echo e($value); ?>

                                <?php endif; ?>
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-700">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.down','data' => ['class' => 'w-4 h-4']]); ?>
<?php $component->withName('livewire-powergrid::icons.down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="pl-4 hidden sm:block md:block lg:block w-full"
                     style="padding-top: 6px;">
                </div>
            </div>
        <?php endif; ?>

        <?php if(filled($data)): ?>
            <div>
                <?php if(method_exists($data, 'links')): ?>
                    <?php echo $data->links(data_get($setUp, 'footer.pagination') ?: powerGridThemeRoot().'.pagination', [
                            'recordCount' => data_get($setUp, 'footer.recordCount'),
                            'perPage' => data_get($setUp, 'footer.perPage'),
                            'perPageValues' => data_get($setUp, 'footer.perPageValues'),
                        ]); ?>

                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($__env->exists(data_get($setUp, 'footer.includeViewOnBottom'))) echo $__env->make(data_get($setUp, 'footer.includeViewOnBottom'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/footer.blade.php ENDPATH**/ ?>