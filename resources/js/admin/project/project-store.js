import routes from "@/route";

let btn = KTUtil.getById("create_project_btn");

KTUtil.addEvent(btn, "click", function () {
    btn.disabled = true;
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Lütfen bekleyiniz.");

    setTimeout(function () {

        let form = $("#create_project_form")
        let form_data = new FormData(form[0])

        let url = routes.admin.projects.store

        $('input[name="multiple_images[]"]').each(function () {
            const files = $(this)[0].files;
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    form_data.append('images[]', files[i]);
                }
            }
        });

        axios.post(url, form_data)
            .then(function (response) {
                if (response.status === 200) {
                    let { route } = response.data.data
                    success(response)
                    window.location.href = route
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

