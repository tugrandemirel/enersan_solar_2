import routes from "@/route";

$(document).on("click", "#contact_btn", function () {

    let form = $("#customer_contact_form");
    let form_data = new FormData(form[0]);

    let url = routes.front.contact.store;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: "POST",
        data: form_data,
        processData: false,
        contentType: false,
        success: function (response) {

            success(response);
            setTimeout(function () {
                window.location.href = routes.front.home.index;
            },2000)
        },
        error: function (error) {
            error(error)
        }
    });
});
