<div class="">
            <div class="flex justify-between mb-1">
                            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400" for="search.">
    Select time
</label>
            
                    </div>
    
    <div class="relative rounded-md  shadow-sm ">
        
        <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" id="search." x-model="searchTime" x-bind:placeholder="modelTime ? modelTime : '12:00'" x-ref="searchTime" x-on:input.debounce.150ms="onSearchTime($event.target.value)" />

            </div>

    
    </div>
<?php /**PATH C:\laragon\www\fakturator\storage\framework\views/325ff9588e2b018f6df0e35ecfb8ee493a9f316b.blade.php ENDPATH**/ ?>