<div class="">
            <div class="flex justify-between mb-1">
                            <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400" for="f42dfa8e36f1ceed9f5bc3ca9b3da3ed">
    Nazwa
</label>
            
                    </div>
    
    <div class="relative rounded-md  shadow-sm ">
                        <input  list="buyer_name"  type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm" name="buyer_name" value="GRUPA PSK SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ" wire:model="data.name" id="f42dfa8e36f1ceed9f5bc3ca9b3da3ed" />
                    <datalist id="buyer_name">
                                    <option value="test">
                            </datalist>
        
                    <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-button
                        wire:click="setLock()"
                        id="abc"
                        class="h-full rounded-r-md"
                        icon="lock-closed"
                         black                         flat
                        squared
                    />
                </div>
            </div>

    
                </div>
