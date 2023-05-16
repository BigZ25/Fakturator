<div>
    <form method="POST" action="<?php echo e(route('settings.store')); ?>" enctype="multipart/form-data" class="ajax-form">
        <?php if($user->id): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="pb-3">
            <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Dane konta','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="flex flex-wrap">
                    <?php echo $__env->make('templates.form.text',['width' => 25,'value' => $user->name,'name' => 'name', 'label' => 'Imię'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.text',['width' => 25,'value' => $user->surname,'name' => 'surname', 'label' => 'Nazwisko'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.text',['width' => 25,'value' => $user->email,'name' => 'email', 'label' => 'Adres e-mail'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <br>
                <div class="flex flex-wrap">
                    <?php echo $__env->make('templates.form.password',['width' => 25 ,'name' => 'new_password','label' => 'Nowe hasło'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('templates.form.password',['width' => 25 ,'name' => 'confirm_new_password','label' => 'Powtórz nowe hasło'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
        </div>
        <div class="pb-3" style="width: 50%;">
            <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Dane firmy','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.company-data',['prefix' => 'company','entity' => $user])->html();
} elseif ($_instance->childHasBeenRendered('l3942761069-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3942761069-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3942761069-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3942761069-0');
} else {
    $response = \Livewire\Livewire::mount('templates.company-data',['prefix' => 'company','entity' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('l3942761069-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
        </div>
        <?php echo $__env->make('templates.buttons.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/settings.blade.php ENDPATH**/ ?>