@extends("front.layouts.app")
@section("title", "Enersan Solar | Hizmetlerimiz")

@section("content")

    <!-- ========================
       page title
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
        <div class="bg-img"><img src="{{ asset("assets/front/images/page-titles/1.jpg") }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hizmetlerimiz</li>
                        </ol>
                    </nav>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="post-grid">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="post-item">
                            <div class="post__img">
                                <a href="{{ route("services.show", ["service_slug" => $service?->slug]) }}">
                                    <img src="{{ $service?->image?->path }}" alt="post image" loading="lazy">
                                </a>
                                <span class="post__date">{{ \App\Helper\DateHelper::short($service->created_at) }}</span>
                            </div>
                            <div class="post__body">
                                <h4 class="post__title">
                                    <a href="{{ route("services.show", ["service_slug" => $service?->slug]) }}">{{ $service?->name }}</a>
                                </h4>
                                <a href="{{ route("services.show", ["service_slug" => $service?->slug]) }}" class="btn btn__secondary btn__outlined btn__custom">
                                    <i class="icon-arrow-right"></i>
                                    <span>Devamı</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.row -->

            @if ($services->hasPages())
                <div class="row">
                    <div class="col-12 text-center">
                        <nav class="pagination-area">
                            <ul class="pagination justify-content-center">
                                {{-- Previous Page --}}
                                @if (!$services->onFirstPage())
                                    <li>
                                        <a href="{{ $services->previousPageUrl() }}" rel="prev">
                                            <i class="icon-arrow-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Links --}}
                                @for ($page = 1; $page <= $services->lastPage(); $page++)
                                    @if ($page == $services->currentPage())
                                        <li class="active"><a class="current" href="#">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $services->url($page) }}">{{ $page }}</a></li>
                                    @endif
                                @endfor

                                {{-- Next Page --}}
                                @if ($services->hasMorePages())
                                    <li>
                                        <a href="{{ $services->nextPageUrl() }}" rel="next">
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </li>

                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </section>


@endsection
