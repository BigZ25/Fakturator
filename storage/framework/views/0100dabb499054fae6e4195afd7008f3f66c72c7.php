<?php if(data_get($setUp, 'header.toggleColumns')): ?>
    <div x-data="{open: false}"
         class="mr-0 sm:mr-2 mt-2 sm:mt-0"
         @click.outside="open = false">
        <button @click.prevent="open = ! open"
                class="block bg-slate-50 text-slate-700 border border-slate-300 rounded py-1.5 px-3 leading-tight
                       focus:outline-none focus:bg-white focus:border-slate-600 dark:border-slate-500 dark:bg-slate-700
                       2xl:dark:placeholder-slate-300 dark:text-slate-200 dark:text-slate-300">
            <div class="flex">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.eye-off','data' => ['class' => 'text-slate-500 dark:text-slate-300']]); ?>
<?php $component->withName('livewire-powergrid::icons.eye-off'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-slate-500 dark:text-slate-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </button>

        <div x-show="open"
             x-cloak
             x-transition:enter="transform duration-200"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transform duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             class="mt-2 py-2 w-48 bg-white shadow-xl absolute z-10 dark:bg-slate-600">

            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$column->forceHidden): ?>
                <div wire:click="$emit('pg:toggleColumn-<?php echo e($tableName); ?>', '<?php echo e($column->field); ?>')"
                     wire:key="toggle-column-<?php echo e($column->field); ?>"
                     class="<?php if($column->hidden): ?> opacity-40 bg-slate-300 dark:bg-slate-800 <?php endif; ?> cursor-pointer flex justify-start block px-4 py-2 text-slate-800 hover:bg-slate-50 hover:text-black-200 dark:text-slate-200 dark:hover:bg-gray-900 dark:hover:bg-slate-700">
                    <?php if(!$column->hidden): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.eye','data' => ['class' => 'text-slate-500 dark:text-slate-300']]); ?>
<?php $component->withName('livewire-powergrid::icons.eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-slate-500 dark:text-slate-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.icons.eye-off','data' => ['class' => 'text-slate-500 dark:text-slate-300']]); ?>
<?php $component->withName('livewire-powergrid::icons.eye-off'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'text-slate-500 dark:text-slate-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <div class="ml-2">
                        <?php echo $column->title; ?>

                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/toggle-columns.blade.php ENDPATH**/ ?>