<div>
    <div class="text-white bg-gray-900">
        <div class="grid grid-cols-12 h-full">
            <div class="col-span-2">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-900 h-12">
                        <a href="<?php echo e(route('home')); ?>"><p class="text-center text-2xl">FAKTURATOR</p></a>
                    </div>
                    <div class="bg-gray-900 h-full">
                        <div class="bg-white pl-2 text-gray-900">
                            <i class="fas fa-fw fa-user mr-1"></i><?php echo e(auth()->user()->email); ?>

                        </div>
                        <ul class="list-none hover:list-disc">
                            <?php $__currentLoopData = config('modules'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route($module['route'])); ?>">
                                    <li class="rounded-sm p-2 cursor-pointer hover:bg-blue-800 <?php if(isset($currentModule) && $currentModule === $key): ?> bg-blue-500 <?php endif; ?>">
                                        <i class="fas fa-fw <?php echo e($module['icon']); ?> mr-1"></i><?php echo e($module['label']); ?>

                                    </li>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-10">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-800 h-full">
                        <div class="p-2">
                            <?php if(!auth()->user()->is_active): ?>
                                <div class="pb-3">
                                    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['color' => 'bg-orange-500 flex','rounded' => 'rounded-sm']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                        <h1 class="text-white text-lg">Twoje konto nie zostało jeszcze aktywowane. Bez tego korzystanie z aplikacji będzie niemożliwe.</h1>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!auth()->user()->company_data_complete): ?>
                                <div class="pb-3">
                                    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['color' => 'bg-orange-500 flex','rounded' => 'rounded-sm']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                        <h1 class="text-white text-lg">Kliknij <a class="hover:text-secondary-500" href="<?php echo e(route('settings.form')); ?>" style="text-decoration: underline;">tutaj</a> aby uzupełnić dane firmy. Bez tego wystawianie faktur będzie niemożliwe.</h1>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make($path,$component_data ?? [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\fakturator\resources\views/template.blade.php ENDPATH**/ ?>