import routes from "@/route";

$(document).on("click", ".delete_reference_btn", function () {
    let button = $(this);
    let reference_uuid = button.data("value");
    let url = routes.admin.references.destroy.replace("{reference_uuid}", reference_uuid);

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
                    $('#fetch_sliders_datatable').DataTable().ajax.reload(null, false); // false => sayfayı değiştirme

                })
                .catch(errors => {
                    error(errors)
                });
        } else {
            Swal.fire("İptal edildi", "Servis silinmedi.", "info");
        }
    });
});
