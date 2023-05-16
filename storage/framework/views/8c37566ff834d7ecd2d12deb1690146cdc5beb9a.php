<td class="mb-2 ml-2 mr-2" style="width: <?php echo e($width ?? 50); ?>%">
    <?php if (isset($component)) { $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\MyInput::class, ['datalist' => ''.e($datalist ?? false).'','options' => $options ?? []]); ?>
<?php $component->withName('my-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => ''.e($name ?? '').'','value' => ''.e($value ?? '').'','wire:model' => ''.e($model ?? '').'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled ?? false)]); ?>
         <?php $__env->slot('append', null, []); ?> 
            <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <x-button
                    wire:click="setLock(<?php echo e($index); ?>)"
                    id="abc"
                    class="h-full rounded-r-md"
                    icon="<?php echo e($items[$index]['connect'] ? 'lock-closed' : 'lock-open'); ?>"
                    <?php if($items[$index]['product_id']): ?> green <?php else: ?> black <?php endif; ?>
                    flat
                    squared
                />
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb)): ?>
<?php $component = $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb; ?>
<?php unset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb); ?>
<?php endif; ?>
</td>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/invoices/items/partials/name_input.blade.php ENDPATH**/ ?>