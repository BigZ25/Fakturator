<div class="pb-3">
    <?php if (isset($component)) { $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f = $component; } ?>
<?php $component = $__env->getContainer()->make(WireUi\View\Components\Card::class, ['title' => ''.e($label).'','color' => 'bg-white flex','rounded' => 'rounded-sm','cardClasses' => 'card-body']); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if(count($items) > 0): ?>
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <table class="w-full table-auto text-left border">
                        <thead>
                        <tr>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Nazwa",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Jednostka",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Ilość",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Stawka VAT",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Cena",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Netto",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "VAT",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('templates.table.form.th',['label' => "Brutto",'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </tr>
                        </thead>
                        <tbody class="border">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php if(!$onlyShow): ?>
                                    <?php echo $__env->make('templates.form.hidden',['name' => 'items['.$index.'][product_id]','value' => $item['product_id'],'model' => 'items.'.$index.'.product_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('modules.invoices.items.partials.name_input',['name' => 'items['.$index.'][name]','model' => 'items.'.$index.'.name','value' => $item['name'],'width' => 30,'datalist' => true,'options' => $lists['products'],'index' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.select',['name' => 'items['.$index.'][unit]','model' => 'items.'.$index.'.unit','value' => $item['unit'],'options' => $lists['units'],'width' => 10], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.text',['name' => 'items['.$index.'][quantity]','model' => 'items.'.$index.'.quantity','value' => $item['quantity'],'width' => 10], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.select',['name' => 'items['.$index.'][vat_type]','model' => 'items.'.$index.'.vat_type','value' => $item['vat_type'],'options' => $lists['vat_types'],'width' => 10], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.text',['name' => 'items['.$index.'][price]','model' => 'items.'.$index.'.price','value' => $item['price'],'width' => 10], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['netto'])); ?></td>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['vat'])); ?></td>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['brutto'])); ?></td>
                                    <?php echo $__env->make('templates.table.form.remove',['index' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                    <?php echo $__env->make('templates.table.form.text',['value' => $item['name'],'width' => 30,'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.select',['value' => $item['unit'],'options' => $lists['units'],'width' => 10,'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.text',['value' => $item['quantity'],'width' => 10,'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.select',['value' => $item['vat_type'],'options' => $lists['vat_types'],'width' => 10,'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('templates.table.form.text',['value' => $item['price'],'width' => 10,'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['netto'])); ?></td>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['vat'])); ?></td>
                                    <td class="text-center"><?php echo e(formatPriceShow($item['brutto'])); ?></td>
                                    <?php if(!$onlyShow): ?>
                                        <?php echo $__env->make('templates.table.form.remove',['index' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-center"><b>Razem:</b></td>
                            <td class="text-center"><?php echo e(formatPriceShow($totalNetto)); ?></td>
                            <td class="text-center"><?php echo e(formatPriceShow($totalVat)); ?></td>
                            <td class="text-center"><?php echo e(formatPriceShow($totalBrutto)); ?></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <p>Brak pozycji</p>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!$onlyShow): ?>
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <?php echo $__env->make('templates.buttons.button',['color' => 'positive', 'label' => 'Dodaj pozycję','icon' => 'plus','action' => 'addItem()'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f)): ?>
<?php $component = $__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f; ?>
<?php unset($__componentOriginal44f62f84306855e3c57ece6b1f51e0fefd3d487f); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\fakturator\resources\views/modules/invoices/items/form.blade.php ENDPATH**/ ?>