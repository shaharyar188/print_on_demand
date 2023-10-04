$(document).ready(function () {
    $(document).on("click", ".restore", function (stop) {
        stop.preventDefault();
        var id = $(this).data("restore");
        var get_url = $(this).closest("tr").find("#get_url_restore").val();
        var module_name = $(this).closest("tr").find("#module_name").val();
        var element = this;
        $.ajax({
            url: get_url + "/" + id,
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (response.message == 200) {
                    Swal.fire({
                        toast: true,
                        icon: "success",
                        title: module_name + " Stored Successfully..!",
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $(element).closest("tr").fadeOut();
                } else {
                    Swal.fire({
                        toast: true,
                        icon: "error",
                        title: module_name + " Not Stored Successfully..!",
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
            },
        });
    });
});
