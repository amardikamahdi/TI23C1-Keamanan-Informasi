function defaultAjax(form) {
    form.off().on("submit", function (e) {
        e.preventDefault();

        var submitButton = $(this).find("button[type=submit]");
        var submitButtonHtml = submitButton.html();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                submitButton.attr("disabled", "disabled");
                submitButton.html(
                    'Memproses <span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>'
                );
            },
            success: function (res) {
                toastr.success(`${res.message}`);
                if (res?.redirect) {
                    setTimeout(function () {
                        window.location.href = res.redirect;
                    }, 1000);
                }
            },
            error: function (xhr, status, error) {
                let errorList = "";
                if (typeof (xhr.responseJSON?.errors) === 'object') {
                    $.each(xhr.responseJSON?.errors, function (key, value) {
                        if (value.length > 1) {
                            $.each(value, function (key, value) {
                                errorList += value + "<br/>";
                            });
                        } else {
                            errorList += value + "<br/>";
                        }
                    });
                } else {
                    errorList += xhr.responseJSON?.message;
                }

                toastr.error(`${errorList}`);

                submitButton.removeAttr("disabled");
                submitButton.html(submitButtonHtml);

                if (xhr.responseJSON?.status === "session_expired") {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            }
        });
    });
}
