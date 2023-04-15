<div class="pb-3">
    <x-card title="Zdjęcia" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
        <input type="file" multiple id="files" name="photos[]" accept=".png, .jpg, .jpeg" onchange="readFile(this);" style="display: none;">
        <div id="input-area" class="flex flex-col items-center justify-center border-2 border-blue-500 mb-2">
            <x-icon name="cloud-upload" class="w-16 h-16 text-blue-600"/>
            <p class="text-blue-600">Click or drop files here</p>
        </div>
        <div id="preview" class="flex items-center justify-center border-2 border-blue-500">
            <h3 class="my-2" id="no-photos">Brak zdjęć</h3>
        </div>
    </x-card>
    <script>
        $('#input-area').on('click', function () {
            //if ($('#files').input.files.length < 8)
            $('#files').trigger('click');
            //readFile(this);
        })

        $("#input-area").hover(function () {
            $(this).css('cursor', 'pointer');
        }, function () {
            $(this).css('cursor', 'auto');
        });

        $(document).on('click', ".img-thumbnail", function () {
            console.log($('#files').prop('files'));
        });

        function readFile(input) {
            counter = input.files.length;

            if (counter <= 8) {
                for (x = 0; x < counter; x++) {
                    if (input.files && input.files[x]) {

                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $("#preview").append('<img src="' + e.target.result + '" class="img-thumbnail inline-block">');
                        };

                        reader.readAsDataURL(input.files[x]);
                    }
                }

                //$('#input-area').addClass('hidden');
                $('#no-photos').addClass('hidden');
            }
        }
    </script>
</div>
