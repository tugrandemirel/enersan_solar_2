@extends("admin.layouts.app")
@section('title', 'Hizmetlerimiz')
@php
    $servicesToggle = "active";
@endphp
@section("content")
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Hizmetlerimiz
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

                <a href="{{ route("admin.services.index") }}" class="btn btn-secondary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    <span class="d-none d-sm-inline-block">Geri</span>

                </a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <div class="card card-custom shadow-none card-transparent">
        <!--begin::Body-->
        <div class="card-body bg-white border-bottom border-left border-right p-5">
            <form id="create_service_form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service_name">Hizmet Adı</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Hizmet Adı">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service_status">Hizmet Durumu</label>
                            <select class="form-control select-without-search" id="service_status" name="service_status">
                                <option value="" disabled selected>Seçiniz</option>
                                @foreach($service_statuses as $service_status)
                                    <option value="{{ $service_status?->code }}">{{ $service_status?->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <!-- Görsel yükleme alanı -->
                    <div class="col-md-4 mb-4">
                        <label>Görsel Yükle</label>
                        <div class="file-upload-wrapper">
                            <button type="button" class="btn btn-primary btn-block upload-btn">Görsel Yükle</button>
                            <input type="file" name="image" accept="image/*" class="d-none file-input" data-type="image">
                            <div class="file-preview d-none position-relative mt-3"></div>
                        </div>
                    </div>

                    <!-- Belge yükleme alanı 1 -->
                    <div class="col-md-4 mb-4">
                        <label>Belge Yükle 1</label>
                        <div class="file-upload-wrapper">
                            <button type="button" class="btn btn-secondary btn-block upload-btn">Belge Yükle</button>
                            <input type="file" name="file_one" accept=".pdf,.doc,.docx,.xls,.xlsx" class="d-none file-input" data-type="document">
                            <div class="file-preview d-none position-relative mt-3"></div>
                        </div>
                    </div>

                    <!-- Belge yükleme alanı 2 -->
                    <div class="col-md-4 mb-4">
                        <label>Belge Yükle 2</label>
                        <div class="file-upload-wrapper">
                            <button type="button" class="btn btn-secondary btn-block upload-btn">Belge Yükle</button>
                            <input type="file" name="file_two" accept=".pdf,.doc,.docx,.xls,.xlsx" class="d-none file-input" data-type="document">
                            <div class="file-preview d-none position-relative mt-3"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Haber İçeriği:</label>
                            <textarea name="content" class="summernote form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end">
                <button type="button" id="create_service_btn" class="btn btn-primary mr-2">Kaydet</button>
                <button type="reset" class="btn btn-secondary">İptal</button>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Subheader-->
@endsection
@push('js')
    <script src="{{ asset('assets/admin/js/pages/select2.js') }}"></script>

    @vite([
    "resources/js/admin/select2.js",
    "resources/js/admin/summernote.js",
    "resources/js/admin/file.js",
    "resources/js/admin/service/setting-store.js",
])
@endpush
