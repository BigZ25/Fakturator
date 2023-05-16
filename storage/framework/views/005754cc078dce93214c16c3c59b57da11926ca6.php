<?php $__env->startSection('template'); ?>
    <div class="h-full text-white">
        <div class="flex flex-col h-screen">
            <div class="bg-gray-800 h-full">
                <div class="flex justify-center items-center h-screen">
                    <div class="p-2" style="width: 50%">
                        <h1 class="text-5xl text-center my-6">FAKTURATOR</h1>
                        <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => 'Rejestracja','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                            <form method="POST" action="<?php echo e(route('register.post')); ?>" class="ajax-form" data-captcha="true">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('templates.form.text',['width' => 100,'name' => 'name', 'label' => 'Imię'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('templates.form.text',['width' => 100,'name' => 'surname', 'label' => 'Nazwisko'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('templates.form.text',['width' => 100,'name' => 'email', 'label' => 'Adres e-mail'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('templates.form.password',['width' => 100,'name' => 'password', 'label' => 'Hasło'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('templates.form.password',['width' => 100,'name' => 'confirm_password', 'label' => 'Powtórz hasło'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('templates.form.captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="my-6 ml-2">
                                    <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['label' => 'Zarejestruj']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['info' => true,'class' => 'mr-2','type' => 'submit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Button::class, ['outline' => true,'label' => 'Zaloguj się','href' => ''.e(route('login.form')).'']); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['info' => true,'class' => 'mr-2','type' => 'button']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d)): ?>
<?php $component = $__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d; ?>
<?php unset($__componentOriginalbd1b2348f4874b2c103814cdbbacb8cf8aef3b4d); ?>
<?php endif; ?>
                                </div>
                            </form>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fakturator\resources\views/register.blade.php ENDPATH**/ ?>