<?php $helperClass = app('PowerComponents\LivewirePowerGrid\Helpers\Helpers'); ?>

<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $content = $row->{$column->field};
        $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
        $field   = $column->dataField != '' ? $column->dataField : $column->field;
    ?>
    <td class="<?php echo e($theme->table->tdBodyClass . ' '.$column->bodyClass ?? ''); ?>"
        style="<?php echo e($column->hidden === true ? 'display:none': ''); ?>; <?php echo e($theme->table->tdBodyStyle . ' '.$column->bodyStyle ?? ''); ?>"
    >
        <?php if(data_get($column->editable, 'hasPermission') && !str_contains($field, '.')): ?>
            <span class="<?php echo e($theme->clickToCopy->spanClass); ?>">
                <?php echo $__env->make($theme->editable->view, ['editable' => $column->editable], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($column->clickToCopy): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.click-to-copy','data' => ['row' => $row,'field' => $content,'label' => data_get($column->clickToCopy, 'label') ?? null,'enabled' => data_get($column->clickToCopy, 'enabled') ?? false]]); ?>
<?php $component->withName('livewire-powergrid::click-to-copy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['row' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(data_get($column->clickToCopy, 'label') ?? null),'enabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(data_get($column->clickToCopy, 'enabled') ?? false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </span>
        <?php elseif(count($column->toggleable) > 0): ?>
            <?php
                $rules = $actionRulesClass->recoverFromAction('pg:rows', $row);
                $toggleableRules =  collect(data_get($rules, 'showHideToggleable', []));
                $showToggleable = ($toggleableRules->isEmpty() || $toggleableRules->last() == 'show');
            ?>
            <?php echo $__env->make($theme->toggleable->view, ['tableName' => $tableName], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <span class="<?php if($column->clickToCopy): ?> <?php echo e($theme->clickToCopy->spanClass); ?> <?php endif; ?>">
                    <div>
                        <?php echo $content; ?>

                    </div>
                    <?php if($column->clickToCopy): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-powergrid::components.click-to-copy','data' => ['row' => $row,'field' => $content,'label' => data_get($column->clickToCopy, 'label') ?? null,'enabled' => data_get($column->clickToCopy, 'enabled') ?? false]]); ?>
<?php $component->withName('livewire-powergrid::click-to-copy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['row' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(data_get($column->clickToCopy, 'label') ?? null),'enabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(data_get($column->clickToCopy, 'enabled') ?? false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
            </span>
        <?php endif; ?>
    </td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/row.blade.php ENDPATH**/ ?>