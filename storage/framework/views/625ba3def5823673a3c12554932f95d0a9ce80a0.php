<div class="">
    
    <div class="relative rounded-md  shadow-sm ">
                        <input  list="items[0][name]"  type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" name="items[0][name]" value="dasd" wire:model="items.0.name" id="0f297308000a6519eacae8a02a3a75dc" />
                    <datalist id="items[0][name]">
                            </datalist>
        
                    <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['icon' => 'lock-open','flat' => true,'squared' => true]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'setLock(0)','id' => 'abc','class' => 'h-full rounded-r-md','black' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
            </div>
            </div>

    
                </div>
<?php /**PATH C:\laragon\www\fakturator\storage\framework\views/b24e7f47adafdfa9db69ebeee1ff601bd45fe2e5.blade.php ENDPATH**/ ?>