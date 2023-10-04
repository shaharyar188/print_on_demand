(function () {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    var formData = new FormData(form_update);
                    var id = $("#update")
                        .closest("#form_update")
                        .find("#id")
                        .val();
                    var get_url = $("#update")
                        .closest("#form_update")
                        .find("#get_url")
                        .val();
                    var module_name = $("#update")
                        .closest("#form_update")
                        .find("#module_name")
                        .val();
                    // --------------------------loading button coading-------------------
                    const button = document.getElementById("update");
                    button.innerHTML =
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                    button.setAttribute("disabled", "disabled");
                    // --------------------------loading button coading-------------------
                    $.ajax({
                        url: get_url + "/" + id,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.message == 200) {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name;
                            } else if (
                                response.message == 400 &&
                                response.module == "campaign"
                            ) {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Add " + module_name;
                                Swal.fire({
                                    toast: true,
                                    icon: "error",
                                    title: "Please Select at least One Sending As Procedure..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                location.reload(true);
                            } else {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name;
                                Swal.fire({
                                    toast: true,
                                    icon: "error",
                                    title:
                                        module_name +
                                        " not Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            }
                            $("form").trigger("reset");
                            form.classList.remove("was-validated");
                        },
                        error: function (error) {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Update" + module_name;
                            var error = error.responseJSON;
                            $.each(error.errors, function (index, value) {
                                $("#" + index).html(value);
                            });
                        },
                    });
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
