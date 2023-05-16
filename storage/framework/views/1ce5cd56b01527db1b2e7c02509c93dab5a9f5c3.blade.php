<div x-data="wireui_inputs_maskable({
    isLazy: false,
    model: window.Livewire.find('uXMGAXAkJhHp3qFvdnD3').entangle('data.postcode'),
    emitFormatted: false,
    mask: &#039;##-###&#039;,
})" >
    <div class="">
            <div class="flex justify-between mb-1">
                            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400" for="7f26ef903cfdf1a51b2445e57c2585c5">
    Kod pocztowy
</label>
            
                    </div>
    
    <div class="relative rounded-md  shadow-sm ">
        
        <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" x-model="input" x-on:input="onInput($event.target.value)" x-on:blur="emitInput" name="postcode" value="01-067" id="7f26ef903cfdf1a51b2445e57c2585c5" />

            </div>

    
                </div>
</div>
