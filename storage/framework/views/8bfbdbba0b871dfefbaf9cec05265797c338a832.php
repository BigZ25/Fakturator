<tr class="<?php echo e($theme->table->trBodyClass); ?>" style="<?php echo e($theme->table->trBodyStyle); ?>">
    <?php if(data_get($setUp, 'detail.showCollapseIcon')): ?>
        <td class="<?php echo e($theme->table->tdBodyClass); ?>" style="<?php echo e($theme->table->tdBodyStyle); ?>"></td>
    <?php endif; ?>
    <?php if($checkbox): ?>
        <td></td>
    <?php endif; ?>
    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if (filled($column->dataField) && str_contains($column->dataField, '.')) {
                $field = $column->field;
            } else
            if (filled($column->dataField) && !str_contains($column->dataField, '.')) {
                $field = $column->dataField;
            } else {
                $field = $column->field;
            }
        ?>
        <td class="<?php echo e($theme->table->tdBodyClassTotalColumns . ' '.$column->bodyClass ?? ''); ?>"
            style="<?php echo e($column->hidden === true ? 'display:none': ''); ?>; <?php echo e($theme->table->tdBodyStyleTotalColumns .' '.$column->bodyStyle ?? ''); ?>">
            <?php if(!$customSummary): ?>
                <?php if($column->count['footer']): ?>
                    <span><?php echo e($column->count['label']); ?>: <?php echo e($withoutPaginatedData->collect()->reject(function($data) use($field) { return empty($data->{$field} ?? $data[$field]); })->count($field)); ?></span>
                    <br>
                <?php endif; ?>
                <?php if($column->sum['footer'] && is_numeric($withoutPaginatedData[0][$field])): ?>
                    <span><?php echo e($column->sum['label']); ?>: <?php echo e(round($withoutPaginatedData->collect()->sum($field), $column->sum['rounded'])); ?></span>
                    <br>
                <?php endif; ?>
                <?php if($column->avg['footer'] && is_numeric($withoutPaginatedData[0][$field])): ?>
                    <span><?php echo e($column->avg['label']); ?>: <?php echo e(round($withoutPaginatedData->collect()->avg($field), $column->avg['rounded'])); ?></span>
                    <br>
                <?php endif; ?>
                <?php if($column->min['footer'] && is_numeric($withoutPaginatedData[0][$field])): ?>
                    <span><?php echo e($column->min['label']); ?>: <?php echo e(round($withoutPaginatedData->collect()->min($field), $column->min['rounded'])); ?></span>
                    <br>
                <?php endif; ?>
                <?php if($column->max['footer'] && is_numeric($withoutPaginatedData[0][$field])): ?>
                    <span><?php echo e($column->max['label']); ?>: <?php echo e(round($withoutPaginatedData->collect()->max($field), $column->max['rounded'])); ?></span>
                    <br>
                <?php endif; ?>
            <?php else: ?>
                <?php if(isset($customSummary[$column->field])): ?>
                    <span><?php echo e($customSummary[$column->field]); ?></span>
                    <br>
                <?php endif; ?>
            <?php endif; ?>
        </td>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($actions) && count($actions)): ?>
        <th class="<?php echo e($theme->table->thClass .' '. $column->headerClass); ?>" scope="col"
            style="<?php echo e($theme->table->thStyle); ?>" colspan="<?php echo e(count($actions)); ?>">
        </th>
    <?php endif; ?>
</tr>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/table-footer.blade.php ENDPATH**/ ?>