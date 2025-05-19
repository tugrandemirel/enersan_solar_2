@extends("front.layouts.app")
@section("title", "Enersan Solar | Projelerimiz")

@section("content")

    <!-- ========================
       page title
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
        <div class="bg-img"><img src="{{ asset("assets/front/images/page-titles/2.jpg") }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projelerimiz</li>
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
                @foreach($projects as $project)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="post-item">
                            <div class="post__img">
                                <a href="">
                                    <img src="{{ $project?->image?->path }}" alt="post image" loading="lazy">
                                </a>
                                <span class="post__date">{{ \App\Helper\DateHelper::short($project->created_at) }}</span>
                            </div>
                            <div class="post__body">
                                <h4 class="post__title">
                                    <a href="#">{{ $project?->name }}</a>
                                </h4>
                                <a href="{{ route("projects.show", ["project_slug" => $project?->slug]) }}" class="btn btn__secondary btn__outlined btn__custom">
                                    <i class="icon-arrow-right"></i>
                                    <span>Devamı</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.row -->

            @if ($projects->hasPages())
                <div class="row">
                    <div class="col-12 text-center">
                        <nav class="pagination-area">
                            <ul class="pagination justify-content-center">
                                {{-- Previous Page --}}
                                @if (!$projects->onFirstPage())
                                    <li>
                                        <a href="{{ $projects->previousPageUrl() }}" rel="prev">
                                            <i class="icon-arrow-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Links --}}
                                @for ($page = 1; $page <= $projects->lastPage(); $page++)
                                    @if ($page == $projects->currentPage())
                                        <li class="active"><a class="current" href="#">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $projects->url($page) }}">{{ $page }}</a></li>
                                    @endif
                                @endfor

                                {{-- Next Page --}}
                                @if ($projects->hasMorePages())
                                    <li>
                                        <a href="{{ $projects->nextPageUrl() }}" rel="next">
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
