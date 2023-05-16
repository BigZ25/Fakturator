<div class="pb-3">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('templates.delete')->html();
} elseif ($_instance->childHasBeenRendered('l721050350-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l721050350-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l721050350-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l721050350-0');
} else {
    $response = \Livewire\Livewire::mount('templates.delete');
    $html = $response->html();
    $_instance->logRenderedChild('l721050350-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => ''.e($box_title).'','color' => 'bg-white','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block w-full p-2">

                    <?php echo $__env->make($theme->layout->header, [
                        'enabledFilters' => $enabledFilters
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(config('livewire-powergrid.filter') === 'outside'): ?>
                        <?php if(count($makeFilters) > 0): ?>
                            <div>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.frameworks.tailwind.filter','data' => ['makeFilters' => $makeFilters,'inputTextOptions' => $inputTextOptions,'tableName' => $tableName,'filters' => $filters,'theme' => $theme]]); ?>
<?php $component->withName('livewire-powergrid::frameworks.tailwind.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['makeFilters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($makeFilters),'inputTextOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputTextOptions),'tableName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName),'filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filters),'theme' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($theme)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="<?php echo e($theme->table->divClass); ?>" style="<?php echo e($theme->table->divStyle); ?>">
                        <?php echo $__env->make($table, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php echo $__env->make($theme->footer->view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/table-base.blade.php ENDPATH**/ ?>