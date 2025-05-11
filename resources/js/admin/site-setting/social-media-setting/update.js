import routes from "@/route";

let btn = KTUtil.getById("socialMediaButton");

KTUtil.addEvent(btn, "click", function () {
    btn.disabled = true;
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Lütfen bekleyiniz.");

    setTimeout(function () {
        let form = $("#socialMediaForm");

        let url = routes.admin.settings.social_media_setting.update
        let data = new FormData(form[0]);

        axios.post(url, data)
            .then(function (response) {
                if (response.status === 200) {
                    success(response)
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

