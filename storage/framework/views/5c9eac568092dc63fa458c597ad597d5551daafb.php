<?php if(data_get($setUp, 'header.searchInput')): ?>
    <div class="flex flex-row mt-2 md:mt-0 w-full rounded-full flex justify-start sm:justify-center md:justify-end">
        <div class="relative rounded-full w-full md:w-4/12 float-end float-right md:w-full lg:w-1/2">
              <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                 <span class="p-1 focus:outline-none focus:shadow-outline">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.search','data' => ['class' => 'text-slate-300 dark:text-slate-200']]); ?>
<?php $component->withName('livewire-powergrid::icons.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-slate-300 dark:text-slate-200']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                 </span>
              </span>
            <input wire:model.debounce.600ms="search" type="text"
                   style="padding-left: 36px !important;"
                   class="placeholder-slate-400 block w-full float-right bg-white text-slate-700 border border-slate-300 rounded-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 pl-10 dark:bg-slate-600 dark:text-slate-200 dark:placeholder-slate-200 dark:border-slate-500"
                   placeholder="<?php echo e(trans('livewire-powergrid::datatable.placeholders.search')); ?>">
            <?php if($search): ?>
                <span class="absolute inset-y-0 right-0 flex items-center pl-1">
                    <span class="p-1 focus:outline-none focus:shadow-outline cursor-pointer">
                        <a wire:click.prevent="$set('search','')">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.x','data' => ['class' => 'text-slate-300 mr-2 w-5 h-5 dark:text-slate-200']]); ?>
<?php $component->withName('livewire-powergrid::icons.x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-slate-300 mr-2 w-5 h-5 dark:text-slate-200']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </a>
                    </span>
                </span>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/search.blade.php ENDPATH**/ ?>