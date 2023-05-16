<th class="text-<?php echo e($align ?? "center"); ?>">
    <?php if(isset($sort_col_id)): ?>
        <button class="btn btn-sm m-0 p-0" wire:click="sortBy('<?php echo e($sort_col_id); ?>')">
            <b><?php echo e($label); ?></b>
            <?php if($sort_col_id === $sorting_col && $sorting_dir === 'asc'): ?>
                <i class="fa fa-fw fa-sort-up"></i>
            <?php elseif($sort_col_id === $sorting_col && $sorting_dir === 'desc'): ?>
                <i class="fa fa-fw fa-sort-down"></i>
            <?php else: ?>
                <i class="fa fa-fw fa-sort" style="color: grey;"></i>
            <?php endif; ?>
        </button>
    <?php else: ?>
        <?php echo e($label); ?>

    <?php endif; ?>
</th>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/table/form/th.blade.php ENDPATH**/ ?>