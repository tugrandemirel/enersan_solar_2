import routes from "@/route";

let btn = KTUtil.getById("contactSettingButton");

KTUtil.addEvent(btn, "click", function () {
    btn.disabled = true;
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Lütfen bekleyiniz.");

    setTimeout(function () {

        let form = $("#contactSettingForm")
        let form_data = new FormData(form[0])

        let url = routes.admin.settings.contact_setting.update

        axios.post(url, form_data)
            .then(function (response) {
                if (response.status === 200) {
                    success(response)
                }
            })
            .catch(function (errors) {
                console.log(errors)
                error(errors)
            })
            .finally(function () {
                KTUtil.btnRelease(btn);
                btn.disabled = false;
            });
    }, 2000);
});

