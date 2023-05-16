<table style="width: 100%; padding-top: 10px;">
    <?php if(isset($label) && $label): ?>
        <tr>
            <td><h6><b><?php echo e($label); ?></b></h6></td>
        </tr>
    <?php endif; ?>
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%" class="bordered">
                <tr>
                    <th><h6>L.p.</h6></th>
                    <th><h6>Nazwa</h6></th>
                    <th><h6>Jednostka</h6></th>
                    <th><h6>Ilość</h6></th>
                    <th><h6>Stawka VAT</h6></th>
                    <th><h6>Cena</h6></th>
                    <th><h6>Netto</h6></th>
                    <th><h6>VAT</h6></th>
                    <th><h6>Brutto</h6></th>
                </tr>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="center"><h6><?php echo e($loop->index + 1); ?>.</h6></td>
                        <td><h6><?php echo e($item->name); ?></h6></td>
                        <td class="center"><h6><?php echo e($item->unit_name); ?></h6></td>
                        <td class="center"><h6><?php echo e($item->quantity); ?></h6></td>
                        <td class="center"><h6><?php echo e($item->vat_type_name); ?></h6></td>
                        <td class="center"><h6><?php echo e(formatPriceShow($item->price)); ?></h6></td>
                        <td class="center"><h6><?php echo e(formatPriceShow($item->netto)); ?></h6></td>
                        <td class="center"><h6><?php echo e(formatPriceShow($item->vat)); ?></h6></td>
                        <td class="center"><h6><?php echo e(formatPriceShow($item->brutto)); ?></h6></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="border: 0;">
                    <td style="border: 0;height: 10px;" colspan="9"></td>
                </tr>
                <tr>
                    <td style="border: 0" colspan="5"></td>
                    <th class="right"><h6><b>Suma:</b></h6></th>
                    <td class="center"><h6><?php echo e(formatPriceShow($items->sum('netto'))); ?></h6></td>
                    <td class="center"><h6><?php echo e(formatPriceShow($items->sum('vat'))); ?></h6></td>
                    <td class="center"><h6><?php echo e(formatPriceShow($items->sum('brutto'))); ?></h6></td>
                </tr>
                <?php if($items->groupBy('vat_type')->keys()->count() > 1): ?>
                    <?php $__currentLoopData = $items->groupBy('vat_type')->keys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vat_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $vat_type_name = $items->where('vat_type',$vat_type)->first()->vat_type_name;
                        ?>
                        <tr>
                            <td style="border: 0" colspan="5"></td>
                            <th class="right"><h6>W tym (VAT <?php echo e($vat_type_name); ?>):</h6></th>
                            <td class="center"><h6><?php echo e(formatPriceShow($items->where('vat_type',$vat_type)->sum('netto'))); ?></h6></td>
                            <td class="center"><h6><?php echo e(formatPriceShow($items->where('vat_type',$vat_type)->sum('vat'))); ?></h6></td>
                            <td class="center"><h6><?php echo e(formatPriceShow($items->where('vat_type',$vat_type)->sum('brutto'))); ?></h6></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </table>
        </td>
    </tr>
</table>
<?php /**PATH C:\laragon\www\fakturator\resources\views/templates/pdf/partials/items.blade.php ENDPATH**/ ?>