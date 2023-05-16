<div class="flex items-center mb-2 ml-2 mr-2" style="width: 50%">
    <div id="captcha_img">
        <?php echo captcha_img(); ?>

    </div>
    <div class="ml-2" style="width: 50%">
        <?php if (isset($component)) { $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\Views\Components\MyInput::class, []); ?>
<?php $component->withName('my-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Przepisz kod z obrazka','name' => 'captcha']); ?>
             <?php $__env->slot('append', null, []); ?> 
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['icon' => 'refresh','flat' => true,'squared' => true]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-full rounded-r-md','info' => true,'onclick' => 'refreshCaptcha()']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb)): ?>
<?php $component = $__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb; ?>
<?php unset($__componentOriginal7d40b76a9dfbb5c042c49a398ebd7b0d569437fb); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/form/captcha.blade.php ENDPATH**/ ?>