import routes from "@/route";

let btn = KTUtil.getById("create_reference_btn");

KTUtil.addEvent(btn, "click", function () {
    btn.disabled = true;
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Lütfen bekleyiniz.");

    setTimeout(function () {

        let form = $("#create_reference_form")
        let form_data = new FormData(form[0])

        let url = routes.admin.references.store

        axios.post(url, form_data)
            .then(function (response) {
                if (response.status === 200) {
                    success(response)
                    form[0].reset();
                    $("#fetch_references_datatable").DataTable().ajax.reload();
                }
            })
            .catch(function (errors) {
                error(errors)
            })
            .finally(function () {
                KTUtil.btnRelease(btn);
                btn.disabled = false;
            });
    }, 2000);
});

