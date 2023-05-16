<div class="">
            <div class="flex justify-between mb-1">
                            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
    Zapłacono dnia
</label>
            
                    </div>
    
    <div class="relative rounded-md  shadow-sm ">
        
        <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" readonly="readonly" x-on:click="togglePicker" x-bind:value="model ? getDisplayValue(): null" name="paid_date" />

                    <div class="absolute inset-y-0 right-3 z-5 flex items-center justify-center">
                    <div class="flex items-center gap-x-2 my-auto
                        text-secondary-400">

                                                    <svg class="cursor-pointer w-4 h-4 hover:text-negative-500 transition-colors ease-in-out duration-150" x-cloak="x-cloak" x-show="model" x-on:click="clearDate()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
</svg>
                        
                        <svg class="cursor-pointer w-5 h-5" x-on:click="togglePicker" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
                    </div>
                </div>
            </div>

    
                </div>
