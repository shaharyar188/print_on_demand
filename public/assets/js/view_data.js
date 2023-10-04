$(document).ready(function () {
    $(document).on("click", ".status", function (stop) {
        stop.preventDefault();
        var id = $(this).data("status");
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
            confirmButtonText: "Yes, change it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/user/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.message == 300) {
                            window.location.href = "{{ url('/offline') }}";
                        } else {
                            $("#user_status_active_" + response.id)
                                .html(response.status)
                                .fadeIn(500);
                            if (response.status == "In-active") {
                                $("#inactive_status_" + response.id).empty();
                                $("#inactive_status_" + response.id).append(
                                    "<i class='ri-eye-fill align-bottom me-2 text-muted'></i>" +
                                        "Active"
                                );
                            } else {
                                $("#inactive_status_" + response.id).empty();
                                $("#inactive_status_" + response.id).append(
                                    "<i class='ri-eye-fill align-bottom me-2 text-muted'></i>" +
                                        "In-active"
                                );
                            }
                        }
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel)
                Swal.fire({
                    toast: true,
                    icon: "success",
                    title: "Staus Saved Successfully..!",
                    animation: false,
                    position: "top-right",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
        });
    });
    // ================== Campaign More Details========================================
    $(document).on("click", ".view", function (stop) {
        stop.preventDefault();
        var id = $(this).data("view");
        $.ajax({
            url: "/campaign/" + id,
            method: "GET",
            success: function (response) {
                if (response.message.campaign_type == 0) {
                    $("#title_active").empty();
                    $("#campaign_type_active").empty();
                    $("#group_active").empty();
                    $("#message_detail_active").empty();
                    $("#keywords_active").empty();
                    $("#campaign_details_active").modal("show");
                    $("#title_active").append(response.message.title);
                    if (response.message.campaign_type == 0) {
                        $("#campaign_type_active").append(
                            "<h6><span class='badge bg-success text-white text-capitalize'>Immediately</span></h6>"
                        );
                    } else {
                        $("#campaign_type_active").append(
                            "<h6><span class='badge bg-warning text-white text-capitalize'>Schedule</span></h6>"
                        );
                    }
                    $("#group_active").append(response.group.group_name);
                    $("#message_detail_active").append(
                        response.message.message_detail
                    );
                    $.each(response.keyword, function (key, value) {
                        $("#keywords_active").append(
                            "<span class='badge bg-light text-dark text-capitalize'>" +
                                value +
                                "</span>"
                        );
                    });
                } else {
                    $("#title").empty();
                    $("#campaign_type").empty();
                    $("#group").empty();
                    $("#message_detail").empty();
                    $("#keywords").empty();
                    $("#campaign_details").modal("show");
                    $("#title").append(response.message.title);
                    if (response.message.campaign_type == 0) {
                        $("#campaign_type").append(
                            "<h6><span class='badge bg-success text-white text-capitalize'>Immediately</span></h6>"
                        );
                    } else {
                        $("#campaign_type").append(
                            "<h6><span class='badge bg-warning text-white text-capitalize'>Schedule</span></h6>"
                        );
                    }
                    $("#group").append(response.group.group_name);
                    $("#message_detail").append(
                        response.message.message_detail
                    );
                    $.each(response.keyword, function (key, value) {
                        $("#keywords").append(
                            "<span class='badge bg-light text-dark text-capitalize'>" +
                                value +
                                "</span>"
                        );
                    });
                    if (response.message.campaign_type == 1) {
                        $("#campaign_date_title").html("Sheduling Date");
                        $("#campaign_date").html(response.message.date);
                        $("#campaign_time_title").html("Sheduling Time");
                        $("#campaign_time").html(response.message.time);
                    } else {
                        $("#campaign_date_title").empty();
                        $("#campaign_date").empty();
                        $("#campaign_time_title").empty();
                        $("#campaign_time").empty();
                    }
                }
            },
        });
    });
    // ================== Campaign More Details========================================
    //  ================ Campaign More Details================
    $(document).on("click", ".description", function (stop) {
        stop.preventDefault();
        var description = $(this).closest("tr").find("#description").val();
        $("#message_details").modal("show");
        $("#message_detail").empty();
        $("#message_detail").append(description);
    });
});
