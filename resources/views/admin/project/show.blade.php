@php
    $projectToggle = "active";
@endphp
@extends("admin.layouts.app")
@section("title", "Proje Detay")
@push("css")
    <style>
        .note-content p {
            margin-bottom: 1rem;
        }

        .note-content h1, .note-content h2 {
            margin-top: 1.5rem;
            font-weight: bold;
        }

        .note-content ul, .note-content ol {
            padding-left: 1.5rem;
        }

        .note-content img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .img-thumbnail {
            transition: transform 0.3s ease;
        }
        .img-thumbnail:hover {
            transform: scale(1.05);
        }
    </style>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@10/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>

@endpush
@section("content")
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Projelerimiz
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

                <a href="{{ route("admin.projects.index") }}" class="btn btn-secondary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    <span class="d-none d-sm-inline-block">Geri</span>

                </a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    @include("admin.project.partials.card-info.professional-card-info")
    <div class="card card-custom">
        <div class="card-body note-content bg-white p-4 border rounded shadow-sm">
            {!! $project->description !!}
        </div>
    </div>
@endsection
@push("js")
    @vite([
    "resources/js/admin/project/swiper.js"
    ])
@endpush
