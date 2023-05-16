<html>
<head>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <script>window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="https://fakturator.localhost/wireui/assets/scripts?id=b0d885fc21cacd449e0a21ea270c5005" defer></script>
    <script type="text/javascript" src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/main.js?v='.filemtime(public_path('js/main.js')))); ?>"></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php if(isset($title)): ?>
        <title><?php echo e($title); ?> | Fakturator</title>
    <?php else: ?>
        <title>Fakturator</title>
    <?php endif; ?>
</head>
<body <?php if(session()->has('message')): ?> data-notification-content="<?php echo e(session()->get('message')['content']); ?>" data-notification-type="<?php echo e(session()->get('message')['type']); ?>" <?php endif; ?>>
<?php if (isset($component)) { $__componentOriginal92d1a160a4445015711a1d3715ec46524d39b3ba = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Notifications::class, []); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92d1a160a4445015711a1d3715ec46524d39b3ba)): ?>
<?php $component = $__componentOriginal92d1a160a4445015711a1d3715ec46524d39b3ba; ?>
<?php unset($__componentOriginal92d1a160a4445015711a1d3715ec46524d39b3ba); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('template'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\fakturator\resources\views/index.blade.php ENDPATH**/ ?>