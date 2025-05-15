@extends("admin.layouts.app")
@section('title', 'Referanslarımız')
@php
    $referencesToggle = "active";
@endphp
@push('css')
    <link href="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section("content")
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Referanslarımız
                </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                {{--                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>--}}

                {{--                <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>--}}

                {{--                <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">--}}
                {{--                    Add New--}}
                {{--                </a>--}}
                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->

                <a href="#" data-toggle="modal" data-target="#referenceCreateModal"
                   class="btn btn-light-success font-weight-bolder btn-sm">
                    <i class="fa fa-plus"></i>
                    <span class="d-none d-sm-inline-block">Yeni Ekle</span>

                </a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <div class="card card-custom shadow-none card-transparent">

        <!--begin::Body-->
        <div class="card-body bg-white border-bottom border-left border-right p-5">
            <!--begin::Table-->
            @include("admin.reference.partials.fetch-references-datatable")
        </div>
        <!--end::Body-->
    </div>
    <!--end::Subheader-->
    @includeIf("admin.reference.partials.reference-create-modal")
@endsection
@push("js")
    <script src="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    @vite([
        "resources/js/admin/reference/fetch-references-datatable.js",
        "resources/js/admin/reference/reference-store.js",
        "resources/js/admin/reference/reference-destroy.js",
        "resources/js/admin/file.js",
    ])
@endpush
