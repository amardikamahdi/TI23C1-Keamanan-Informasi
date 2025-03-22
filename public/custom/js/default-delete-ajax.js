function defaultDelete(event, url) {
    event.preventDefault();

    Swal.fire({
        title: "Apakah Anda yakin ingin menghapus data ini?",
        // text: " Data ini mungkin akan berpengaruh pada data lain yang terkait.",
        icon: "warning",
        buttonsStyling: false,
        confirmButtonText: "Ya, hapus!",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-light",
        },
        showCancelButton: true,
        cancelButtonText: "Tidak, batalkan!",
    }).then(function (result) {
        {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: "DELETE",
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

                        if (xhr.responseJSON?.status === "session_expired") {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        }
    });
}
