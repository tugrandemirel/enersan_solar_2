import route from "@/route";

"use strict"
let ServicesDatatablesDataSourceAjaxServer = function () {

    let initTable1 = function () {
        let fetch_services_datatable = $('#fetch_services_datatable');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });


        // begin first table
        fetch_services_datatable.DataTable({
            "fixedHeader": {
                "header":true
            },
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            searching: true,
            dom: `<'row'<'col-sm-12'tr>>
          <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            "language": {
                "emptyTable": "Boş Tablo",
                "processing": `<button type="button" class="btn btn-lg spinner spinner-primary spinner-left mr-3 text-black">Yükleniyor</button>`,
                "sDecimal": ",",
                "sInfo": "_TOTAL_ kayıttan _START_ - _END_ veri göster",
                "sInfoFiltered": "(_MAX_ veri bulundu)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Sayfa _MENU_ veri göster",
                "sLoadingRecords": "Yükleniyor",
                "sSearch": "Arama",
                "sZeroRecords": "Veri bulunamadı",
                "oPaginate": {
                    "sFirst": "İlk",
                    "sLast": "Son",
                    "sNext": "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending": "Artan sıra",
                    "sSortDescending": "Azalan sıra"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            },
            order: [[1, 'desc']],
            "ordering": false,
            ajax: {
                url: route.admin.services.index,
                type: 'POST',
            },
            columns: [
                {
                    data: null,
                    class: "min-w-150px",
                    render: function (data, type, row) {
                        return `
                            <a href="#" class=" font-weight-bolder font-size-sm">${row?.name}</a>
                        `
                    },
                    orderable: false,
                    searchable: false,

                },
                {
                    data: null,
                    class: "min-w-150px",
                    render: function (data, type, row) {

                        return `
                               <div class="d-flex align-items-center">
                                  <div class="symbol symbol-50 flex-shrink-0">
                                         <img src="/${row?.image?.path ?? ''}" alt="photo">
                                     </div>
                              </div
                        `
                    },
                    orderable: false,
                    searchable: false,
                },
                {
                    data: null,
                    class: "min-w-100px text-center",
                    render: function (data, type, row) {
                        return ` <span style="width: 120px;"><span class="label label-${getStatusLabelColor(row?.service_status?.code)} label-dot mr-2"></span>
                                    <span class="font-weight-bold text-${getStatusLabelColor(row?.service_status?.code)}">${row?.service_status?.name}</span>
                                </span>`
                    },
                    orderable: false,
                    searchable: false,

                },
                {
                    data: null,
                    class: "min-w-100px text-center",
                    render: function (data, type, row) {

                        let publish_date = row.created_at;

                        moment.locale("tr");
                        if (publish_date) {
                            let publish_date_format = moment(publish_date);
                            publish_date = publish_date_format.format("Do MMM YYYY");
                        }

                        return `
                        <div class="d-flex flex-column flex-grow-1">
                           <span class="text-dark-75 mb-1 font-size-lg">${publish_date}</span>
                        </div>
                        `
                    },
                    orderable: false,
                    searchable: false,

                },
                {
                    data: "created_by_user.name",
                    class: "min-w-150px",
                    render: function (data, type, row) {
                        return `
                            <a href="#" class=" font-weight-bolder font-size-sm">${row?.created_by_user?.name}</a>
                        `
                    },
                    orderable: false,
                    searchable: false,

                },
                {
                    data: null,
                    class: "min-w-100px gap-5",
                    render: function (data, type, row) {
                        let delete_url = route.admin.services.destroy.replace("{service_uuid}", row?.uuid);
                        return `
                            <a href="${route.admin.services.show}${row?.uuid}" class="btn btn-icon btn-light btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <defs></defs>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                            </a>
                            <a href="#" class="btn btn-icon btn-light btn-sm delete_service_btn" data-value="${row?.uuid}">
                                <span class="svg-icon svg-icon-md svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <defs></defs>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                            </a>

                          `;
                    },
                    searchable: false,
                    orderable: false,
                },
            ]
        });
    };

    return {
        init: function () {
            initTable1();
        },
    };
}();

$(document).ready(function () {
    ServicesDatatablesDataSourceAjaxServer.init();
});

const notImage = () => {
  return `

<div class="symbol symbol-50 flex-shrink-0">
    <a class="nav nav-pills nav-danger nav-link active" data-toggle="pill" href="#tab_forms_widget_4">
        <span class="nav-icon py-2 w-auto text-danger" >
            <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

            <defs></defs>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
            </g>
            </svg><!--end::Svg Icon--></span>
        </span>
        <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
        </span>
    </a>
</div>
  `
}

const getStatusLabelColor = (code) => {
    let colors = {
        active: 'success',
        passive: 'danger',
    }
    return colors[code] || 'primary'
}
