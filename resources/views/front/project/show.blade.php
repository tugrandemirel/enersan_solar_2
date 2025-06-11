@extends("front.layouts.app")
@section("title", "Enersan Solar | ". $project?->name)

@section("content")


    <!-- ========================
       page title
    =========================== -->
    <section class="page-title page-title-layout2 bg-overlay bg-overlay-2 bg-parallax">
        <div class="bg-img"><img src="{{ asset($project?->image?->path) }}" alt="{{ $project?->name }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h1 class="pagetitle__heading mb-0">{{ $project?->name }}</h1>
                    <div class="d-flex align-items-center mt-30">
                        <a href="{{ route("contacts.index") }}" class="btn btn__primary mr-30">
                            <i class="icon-arrow-right"></i> <span>İletişime Geç</span>
                        </a>
{{--                        <a href="about-us.html" class="btn btn__white">Hakkımızda</a>--}}
                    </div>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="breadcrumb-wrapper bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route("home") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="{{ route("projects.index") }}">Hizmetlerimiz</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $project?->name }}</li>
                            </ol>
                        </nav>
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb-wrapper -->
    </section><!-- /.page-title -->

    <!-- ======================
      Text Content Section
    ========================= -->
    <section class="text-content-section pb-90">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar has-marign-right mb-30">
                        @if($other_projects->count() > 0)
                        <div class="widget widget-categories">
                            <h5 class="widget__title">Diğer Projelerimiz</h5>
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    @foreach($other_projects as $other_project)
                                    <li>
                                        <a href="{{ route("projects.show", ["project_slug" => $other_project?->slug]) }}" class="active">
                                            <i class="icon-arrow-right"></i>
                                            <span>
                                                {{ $other_project?->name }}
                                            </span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-categories -->
                        @endif
                        <div class="widget widget-help bg-overlay bg-overlay-primary">
                            <div class="bg-img"><img src="assets/images/banners/7.jpg" alt="banner"></div>
                            <div class="widget__content">
                                <h5 class="widget__title">Alanında Uzman Ekiplerle Hızlı ve Güvenilir Hizmet</h5>
                                <p class="widget__desc mb-30">
                                    Küresel ölçekteki deneyimimizle projelerinizi zamanında, uygun maliyetlerle ve tüm yasal gerekliliklere uygun şekilde tamamlamanızı sağlıyoruz.
                                </p>
                                <a href="" class="btn btn__white btn__outlined btn__block mb-30">
                                    Randevu Planlayın
                                </a>
                                <div class="contact__number d-none d-xl-flex align-items-center">
                                    <i class="icon-phone"></i>
                                    <a href="tel:{{ $contact?->phone ?? '' }}">{{ $contact?->phone ?? '' }}</a>
                                </div>
                            </div>

                        </div><!-- /.widget-help -->
                         @isset($project?->documents)
                        <div class="widget widget-download">
                            <h5 class="widget__title">Belgelerimiz</h5>
                            <div class="widget__content">
                                @foreach($project?->documents as $document)
                                <a href="{{ $document?->path }}" class="btn btn__primary btn__block mb-20" download>
                                    <span>{{ $document?->file_name }}</span>
                                   <i class="fa fa-download"></i>
                                </a>
                                @endforeach
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-download -->
                            @endisset
                    </aside><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="text__block mb-30">
                        {!! $project->description !!}
                    </div><!-- /.text-block -->
                    @if($project?->galleries->count() > 0)
                    <div class="row">
                        @foreach($project->galleries as $gallery)
                            <!-- gallery item #1 -->
                            <div class="col-sm-6">
                                <div class="gallery-item">
                                    <a class="popup-gallery-item" href="{{ asset($gallery?->path) }}">
                                        <img src="{{ asset($gallery?->path) }}" alt="gallery img">
                                    </a>
                                </div><!-- /.gallery-item -->
                            </div><!-- /.col-sm-6 -->
                        @endforeach
                        <!-- gallery item #2 -->
                    </div><!-- /.row -->
                    @endif
                    <div class="text__block mb-30">
                        <h5 class="text__block-title">Neden Biz?</h5>
                        <p class="text__block-desc">
                            Yıllara dayanan tecrübemiz, uzman kadromuz ve müşteri odaklı yaklaşımımızla sektörde fark yaratıyoruz. İhtiyacınıza özel çözümler geliştiriyor, projelerinizi zamanında ve kaliteli bir şekilde hayata geçiriyoruz. Güvenilir, şeffaf ve sürdürülebilir hizmet anlayışımızla daima yanınızdayız.
                        </p>
                    </div>
                    <div class="row features-layout3">
                        <!-- Feature item #1 -->
                        <div class="col-sm-4">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-hydro-power3"></i>
                                </div>
                                <h4 class="feature__title">Enerji Tasarrufu</h4>
                                <p class="feature__desc">GES projelerimizle enerji maliyetlerinizi %70'e varan oranlarda düşürün, yatırımınızı kısa sürede amorti edin.
                                </p>
                                <a href="{{ route("projects.index") }}" class="btn__link">
                                    <i class="icon-arrow-right icon-filled"></i>
                                    <span>Keşfet</span>
                                </a>
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-sm-4 -->
                        <!-- Feature item #2 -->
                        <div class="col-sm-4">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-biosphere"></i>
                                </div>
                                <h4 class="feature__title">Müşteri Memnuniyeti</h4>
                                <p class="feature__desc">
                                    Her projede müşteri beklentilerinin ötesine geçmeyi hedefliyor, sürdürülebilir ilişkiler kuruyoruz.
                                </p>
                                <a href="{{ route("projects.index") }}" class="btn__link">
                                    <i class="icon-arrow-right icon-filled"></i>
                                    <span>Keşfet</span>
                                </a>
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-sm-4 -->
                        <!-- Feature item #3 -->
                        <div class="col-sm-4">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-eco-house"></i>
                                </div>
                                <h4 class="feature__title">Anahtar Teslim Çözümler</h4>
                                <p class="feature__desc">Proje tasarımından lisans süreçlerine, kurulumdan bakıma kadar tüm süreçleri sizin için yönetiyoruz.</p>

                                <a href="{{ route("projects.index") }}" class="btn__link">
                                    <i class="icon-arrow-right icon-filled"></i>
                                    <span>Keşfet</span>
                                </a>
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-sm-4 -->
                    </div><!-- /.row -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Text Content Section -->

@endsection
