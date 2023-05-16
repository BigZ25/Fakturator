<td style="width: 50%; vertical-align: top;">
    <table style="width: 100%;" class="bordered">
        <tr>
            <th>
                <h4><b><?php echo e($label); ?></b></h4>
            </th>
        </tr>
        <tr>
            <td style="padding:10px;">
                <h4><?php echo e($invoice[$prefix.'_name']); ?></h4>
                <h4>NIP: <?php echo e($invoice[$prefix.'seller_nip']); ?></h4>
                <h4><?php echo e($invoice[$prefix.'_address']); ?></h4>
                <h4><?php echo e($invoice[$prefix.'_postcode']); ?> <?php echo e($invoice[$prefix.'_city']); ?></h4>
            </td>
        </tr>
    </table>
</td>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/pdf/partials/company_data.blade.php ENDPATH**/ ?>