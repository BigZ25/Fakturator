<div>
    <?php if($entity): ?>
        <?php if (isset($component)) { $__componentOriginaldbbe8c7d130b3e9622b6fcb2d027475c42124971 = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\ModalCard::class, ['title' => ''.e($entity->deletion->title).'','blur' => true]); ?>
<?php $component->withName('modal.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:model.defer' => 'deleteModal']); ?>
            <form method="POST" action="<?php echo e($entity->deletion->route); ?>" id="deleteForm" class="ajax-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <?php if(isset($entity->deletion->ids)): ?>
                    <?php $__currentLoopData = $entity->deletion->ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('templates.form.hidden',['name' => 'ids[]', 'value' => $id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div>
                    <h1 class="text-2xl"><?php echo e($entity->deletion->content); ?></h1>
                </div>
                 <?php $__env->slot('footer', null, []); ?> 
                    <div class="flex justify-end">
                        <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['label' => 'Tak']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['red' => true,'class' => 'mr-2','type' => 'submit','form' => 'deleteForm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['flat' => true,'label' => 'Nie']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mr-2','x-on:click' => 'close']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
                    </div>
                 <?php $__env->endSlot(); ?>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbbe8c7d130b3e9622b6fcb2d027475c42124971)): ?>
<?php $component = $__componentOriginaldbbe8c7d130b3e9622b6fcb2d027475c42124971; ?>
<?php unset($__componentOriginaldbbe8c7d130b3e9622b6fcb2d027475c42124971); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/delete.blade.php ENDPATH**/ ?>