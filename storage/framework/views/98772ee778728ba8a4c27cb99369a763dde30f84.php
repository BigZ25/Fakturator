<?php if(data_get($setUp, 'header.showMessageSoftDeletes') && ($softDeletes === 'withTrashed' || $softDeletes === 'onlyTrashed')): ?>
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-2 my-2">
        <div class="flex">
            <div class="ml-3">
                <p class="text-sm text-yellow-700">
                    <?php if($softDeletes === 'withTrashed'): ?>
                        <?php echo app('translator')->get('livewire-powergrid::datatable.soft_deletes.message_with_trashed'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('livewire-powergrid::datatable.soft_deletes.message_only_trashed'); ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fakturator\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/message-soft-deletes.blade.php ENDPATH**/ ?>