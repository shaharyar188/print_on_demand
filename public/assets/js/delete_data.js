$(document).ready(function () {
    $(document).on("click", ".delete", function (stop) {
        stop.preventDefault();
        var id = $(this).data("del");
        var get_url = $(this).closest("tr").find("#get_url").val();
        var module_name = $(this).closest("tr").find("#module_name").val();
        var element = this;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: get_url + "/" + id,
                    method: "DELETE",
                    dataType: "json",
                    success: function (response) {
                        if (response.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: module_name + " Deleted Successfully..!",
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
                                title:
                                    module_name +
                                    " Not Deleted Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel)
                Swal.fire({
                    toast: true,
                    icon: "success",
                    title: module_name + " Saved Successfully..!",
                    animation: false,
                    position: "top-right",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
        });
    });
});
