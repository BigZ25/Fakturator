<div x-data="wireui_inputs_maskable({
    isLazy: false,
    model: window.Livewire.find('Amk5uH8Z05zF83kWPhFd').entangle('data.nip'),
    emitFormatted: false,
    mask: &#039;#############&#039;,
})" >
    <div class="">
            <div class="flex justify-between mb-1">
                            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400" for="db2eccc630782f3fb5b3adc453616086">
    NIP
</label>
            
                    </div>
    
    <div class="relative rounded-md  shadow-sm ">
        
        <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" x-model="input" x-on:input="onInput($event.target.value)" x-on:blur="emitInput" name="nip" value="5272831048" id="db2eccc630782f3fb5b3adc453616086" />

                    <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <button wire:loading.attr="disabled" wire:loading.class="!cursor-wait" type="button" class="focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2     border text-slate-500 hover:bg-slate-100 ring-slate-200
    dark:ring-slate-600 dark:border-slate-500 dark:hover:bg-slate-700
    dark:ring-offset-slate-800 dark:text-slate-400 h-full rounded-r-md fa fa-search primary flat squared" wire:click="searchByNIP()">
    
    

    
    </button>
            </div>
            </div>

    
                </div>
</div>
