$(document).ready(function () {
    var body = $(this).find('body');

    Livewire.onError((status, response) => {
        response.text().then((body) => {
            var json = JSON.parse(body)
            if (status !== 200) {
                notify('Błąd', json.message, 'error')
                return false
            }
        });
        return false;
    });

    if (body.data('notification-content') && body.data('notification-type')) {
        notify('Powiadomienie', body.data('notification-content'), body.data('notification-type'))
    }

    $(this).on('submit', '.ajax-form', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            //dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (_response) {
                if (_response !== "OK")
                    window.location.replace(_response);
                else
                    window.location.reload();
            },
            error: function (_response) {

                var errors = _response['responseJSON'];

                if (_response.status === 500 || _response.status === 403) {
                    notify(_response['responseJSON'].exception ?? "Błąd", _response['responseJSON'].message, 'error')
                } else {
                    for (var key in errors) {
                        //nested
                        var regex = new RegExp(/.[a-zA-Z0-9_-]*\.[a-zA-Z0-9_-]*\.[a-zA-Z0-9_-]/);

                        if (regex.test(key) === true) {
                            let explode = key.split('.');
                            input_ptr = $("input[name='" + explode[0] + "[" + explode[1] + "][" + explode[2] + "]" + "']");
                        }
                        //
                        else if ($("input[name='" + key + "']").length > 0)
                            input_ptr = $("input[name='" + key + "']");
                        else if ($("select[name='" + key + "']").length > 0)
                            input_ptr = $("select[name='" + key + "']");
                        else if ($("textarea[name='" + key + "']").length > 0)
                            input_ptr = $("textarea[name='" + key + "']");
                        else {
                            input_ptr = null;

                            notify('Powiadomienie', 'Formularz został wypełniony nieprawidłowo', 'warning')
                            notify('Powiadomienie', errors[key].toString() ?? 'Wystąpił nieznany błąd formularza', 'error')
                        }

                        if(input_ptr)
                        {
                            notify('Powiadomienie', 'Formularz został wypełniony nieprawidłowo', 'warning')

                            input_ptr.removeClass('validation-error')
                            input_ptr.parent().find('.error-span').remove()
                            input_ptr.addClass('validation-error')
                            input_ptr.after('<span class="error-span text-red-500">' + errors[key].toString() + '</span>')

                            input_ptr.on('change, input', function () {
                                $(this).removeClass('validation-error')
                                $(this).parent().find('.error-span').remove()
                            })
                        }
                    }
                }
            }
        });
    });

    setInterval(function () {
        $.ajax({
            url: "/session",
            type: "GET",
            dataType: 'json',
            success: function (response) {
                if (response.code === 440) {
                    window.location.replace(response.url);
                }
            }
        });
    }, 60 * 1000);//Co 60 sekund

    function notify(title, description, icon) {
        window.$wireui.notify({
            title: title,
            description: description,
            icon: icon,
        })
    }
})
