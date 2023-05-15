<div class="flex items-center mb-2 ml-2 mr-2" style="width: 50%">
    <div id="captcha_img">
        {!! captcha_img() !!}
    </div>
    <div class="ml-2" style="width: 50%">
        <x-my-input placeholder="Przepisz kod z obrazka" name="captcha">
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-button
                        class="h-full rounded-r-md"
                        icon="refresh"
                        info
                        flat
                        squared
                        onclick="refreshCaptcha()"
                    />
                </div>
            </x-slot>
        </x-my-input>
    </div>
</div>
