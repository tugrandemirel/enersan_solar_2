import routes from "@/route";

$(document).on("click", ".delete_service_btn", function () {
    let button = $(this);
    let service_uuid = button.data("value");
    let url = routes.admin.services.destroy.replace("{service_uuid}", service_uuid);

    Swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlemi geri alamazsınız!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, sil!",
        cancelButtonText: "Hayır"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(url)
                .then(response => {
                    success(response)
                    button.closest("tr").remove();
                    $('#fetch_services_datatable').DataTable().ajax.reload(null, false); // false => sayfayı değiştirme

                })
                .catch(errors => {
                    error(errors)
                });
        } else {
            Swal.fire("İptal edildi", "Servis silinmedi.", "info");
        }
    });
});
