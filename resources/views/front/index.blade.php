@extends("front.layouts.app")
@section("title", "Enersan Solar")
@section("content")
    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
        <div class="slick-carousel carousel-arrows-light carousel-dots-light m-slides-0"
             data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>
            @foreach($sliders as $slider)
                <div class="slide-item align-v-h bg-overlay" @class(['bg-overlay-2' => $loop->first])>
                <div class="bg-img">
                    <img src="{{ asset($slider?->image) }}" alt="{{ $slider?->title }}">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__body">
                                @if($slider->sub_title)
                                    <span class="slide__subtitle">{{ $slider?->sub_title }}</span>
                                @endif
                                @if($slider->title)
                                    <h2 class="slide__title">{{ $slider?->title }}</h2>
                                @endif
                                @if($slider->description)
                                    <p class="slide__desc">{{ $slider?->description }}</p>
                                    @endif
                                    @if($slider->button_link_one || $slider->button_link_two)
                                        <div class="d-flex">
                                            @if($slider->button_link_one)
                                                <a href="{{ $slider->button_link_one }}" class="btn btn__primary mr-30">
                                                    <i class="icon-arrow-right"></i><span>{{ $slider->button_one_text }}</span>
                                                </a>
                                            @endif
                                            @if($slider->button_link_two)
                                                <a href="{{ $slider->button_link_two }}" class="btn btn__white">
                                                    <i class="icon-arrow-right"></i><span>{{ $slider->button_two_text }}</span>
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                            </div><!-- /.slide__body -->
                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            @endforeach
        </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ========================
      About Layout 1
    =========================== -->
    <section class="about-layout1 pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
                    <div class="heading__layout2 mb-60">
                        <h2 class="heading__subtitle">Enerji Sektöründe Liderliğe Giden Yol</h2>
                        <h3 class="heading__title">Güneş Enerjisine Hazırız, Tek İhtiyacımız Onu Doğru Kullanmak!</h3>
                    </div><!-- /.heading__layout2 -->
                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <!-- counter item #1 -->
                    <div class="counter-item">
                        <h4 class="counter">6,154</h4>
                        <p class="counter__desc pr-0">Son 5 Yılda Tamamlanan Proje</p>
                        <div class="divider__line"></div>
                    </div>
                    <!-- counter item #2 -->
                    <div class="counter-item">
                        <h4 class="counter">2,512</h4>
                        <p class="counter__desc pr-0">Alanında Uzman Çalışan ve Ekip</p>
                        <div class="divider__line"></div>
                    </div>
                    <!-- counter item #3 -->
                    <div class="counter-item">
                        <h4 class="counter">0,241</h4>
                        <p class="counter__desc pr-0">Aldığımız Ödül ve Başarılar</p>
                        <div class="divider__line"></div>
                    </div>
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="video-banner-layout2">
                        <img src="{{ asset("assets/front/images/about/1.jpg") }}" alt="about" class="w-100">
                    </div><!-- /.video-banner -->
                </div><!-- /.col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="about__text">
                        <div class="text__icon">
                            <i class="icon-green-energy3"></i>
                        </div>
                        <p class="heading__desc font-weight-medium color-secondary mb-30">    Daha sürdürülebilir, güvenilir ve erişilebilir enerji sistemlerine geçişi destekliyoruz. Yenilikçi çözümlerimizle yalnızca yapılar inşa etmiyor; toplumu ve geleceği de enerjilendiriyoruz.
                        </p>
                        <p class="heading__desc mb-20">    İklim değişikliğinin etkileri her geçen gün daha görünür hale geliyor. Aşırı hava olayları, yükselen deniz seviyeleri ve enerjiye erişimdeki adaletsizlikler bu durumun bir sonucu.
                        </p>
                        <p class="heading__desc mb-20">    Peki, artan enerji ihtiyacını karşılayıp çevremizi nasıl koruyabiliriz? Biz, bu sorunun cevabını teknolojide, yenilenebilir kaynaklarda ve doğru planlamada buluyoruz.
                        </p>
                        <div class="d-flex align-items-center mt-30">
                            <a href="{{ route("services.index") }}" class="btn btn__secondary mr-30">
                                <i class="icon-arrow-right"></i> <span>Daha Fazlası</span>
                            </a>
{{--                            <img src="{{ asset("assets/front/images/about/singnture.png") }}" alt="singnture">--}}
                        </div>
                    </div><!-- /.about__text -->
                </div><!-- /.col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->

    <!-- ======================
    services Layout 2
    ========================= -->
    <section class="services-layout2 pt-120">
        <div class="bg-img"><img src="{{ asset("assets/front/images/backgrounds/5.jpg") }}" alt="Enerji sistemleri arka plan"></div>
        <div class="container">
            <div class="row mb-70">
                <div class="col-12">
                    <h2 class="heading__subtitle color-primary">Geleceğin Enerjisini Bugün İnşa Ediyoruz</h2>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <h3 class="heading__title color-white">GES, Rüzgar Türbinleri ve Elektrik Sistemlerinde Uzman Tedarikçi</h3>
                </div><!-- /col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1">
                    <p class="heading__desc font-weight-bold color-gray mb-30">Yenilenebilir enerji sistemlerinde maliyetleri düşürürken verimliliği artıran çözümler sunuyoruz. Endüstriyel tesisler, tarım işletmeleri ve konutlar için özel tasarlanmış enerji sistemleri.</p>
                    <div class="d-flex align-items-center">
                        <a href="{{ route("contacts.index") }}" class="btn btn__primary btn__primary-style2 mr-30">
                            <i class="icon-arrow-right"></i>
                            <span>Teklif Alın</span>
                        </a>
                        <a href="{{ route("services.index") }}" class="btn btn__white btn__link">
                            <i class="icon-arrow-right"></i>
                            <span>Tüm Hizmetlerimiz</span>
                        </a>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel carousel-arrows-light"
                         data-slick='{"slidesToShow": 4, "slidesToScroll": 4, "arrows": true, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2, "slidesToScroll": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}'>
                        <!-- Hizmet 1 -->
                        @foreach($services as $service)
                        <div class="service-item">
                            <div class="service__img">
                                <img src="{{ $service?->image?->path }}" alt="Güneş Enerji Santrali" loading="lazy">
                            </div>
                            <div class="service__body">
                                <h4 class="service__title">{{ $service->name }}</h4>
                                <a href="{{ route("services.show", ["service_slug" => $service?->slug]) }}" class="btn btn__secondary btn__outlined btn__custom">
                                    <span>Detaylı Bilgi</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- /.carousel-->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <p class="read-note__text">
                        <strong class="color-white">Sürdürülebilir, güvenilir ve ekonomik enerji çözümleri için, </strong>
                        <a href="{{ route("services.index") }}" class="text-underlined-primary color-primary font-weight-bold">
                            <span>Çözümlerimizi Keşfedin </span> <i class="icon-arrow-right"></i>
                        </a>
                    </p>
                </div><!-- /.col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <!-- ======================
    Features Layout 2
    ========================= -->
    <section class="features-layout2 pt-120">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <h2 class="heading__subtitle color-primary">Geleceği Bugünden Şekillendiriyoruz</h2>
                    <h3 class="heading__title">Sürdürülebilir ve Güvenilir Enerji Sistemleri ile Topluma Güç Katıyoruz!</h3>
                    <p class="heading__desc mb-30">Güneş Enerji Santralleri (GES), rüzgar türbinleri ve elektrik altyapı projelerimizle, yenilenebilir enerji sektöründe lider çözümler sunuyoruz. Yılların deneyimi ve uzman ekibimizle enerji verimliliğini artırıyoruz.</p>
                    <p class="heading__desc mb-40">Endüstriyel tesisler, tarımsal işletmeler ve konutlar için özel tasarlanmış enerji çözümlerimizle siz de enerji maliyetlerinizi düşürün, sürdürülebilirliğe katkı sağlayın.</p>
                    <a href="{{ route("projects.index") }}" class="btn btn__primary btn__outlined btn__custom mb-40">
                        <i class="icon-arrow-right"></i>
                        <span>Projelerimizi Keşfedin!</span>
                    </a>
                </div><!-- /col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1">
                    <div class="row">
                        <!-- Özellik 1 -->
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-hydro-power3"></i>
                                </div>
                                <h4 class="feature__title">Enerji Tasarrufu</h4>
                                <p class="feature__desc">GES projelerimizle enerji maliyetlerinizi %70'e varan oranlarda düşürün, yatırımınızı kısa sürede amorti edin.
                                </p>
                            </div>
                        </div>
                        <!-- Özellik 2 -->
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-biosphere"></i>
                                </div>
                                <h4 class="feature__title">Müşteri Memnuniyeti</h4>
                                <p class="feature__desc">
                                    Her projede müşteri beklentilerinin ötesine geçmeyi hedefliyor, sürdürülebilir ilişkiler kuruyoruz.
                                </p>
                            </div>
                        </div>
                        <!-- Özellik 3 -->
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-eco-house"></i>
                                </div>
                                <h4 class="feature__title">Anahtar Teslim Çözümler</h4>
                                <p class="feature__desc">Proje tasarımından lisans süreçlerine, kurulumdan bakıma kadar tüm süreçleri sizin için yönetiyoruz.</p>
                            </div>
                        </div>
                        <!-- Özellik 4 -->
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-energy2"></i>
                                </div>
                                <h4 class="feature__title">Danışmanlık & Planlama</h4>
                                <p class="feature__desc">Saha analizi, fizibilite çalışması ve projelendirme ile en uygun enerji çözümünü sunuyoruz.
                                </p>
                            </div>
                        </div>
                        <!-- Özellik 5 -->
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature__icon">
                                    <i class="icon-electric-car"></i>
                                </div>
                                <h4 class="feature__title">Uzman Kadro</h4>
                                <p class="feature__desc">
                                    Alanında sertifikalı ve deneyimli mühendis kadromuzla, en zorlu projeleri başarıyla tamamlıyoruz.
                                </p>
                            </div>
                        </div>
                        <!-- Özellik 6 -->
                        <div class="col-sm-6">
                            <div class="feature-item feature-item-custom">
                                <div class="feature__icon">
                                    <i class="icon-wind-socket"></i>
                                </div>
                                <h4 class="feature__title">Başarılar & <br> Referanslar</h4>
                                <p class="feature__desc">50+ MW kurulu güç, 100'den fazla başarılı proje ile sektörün öncüsüyüz.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================
   portfolio Layout 3
    ========================= -->
    <section class="portfolio-layout3 portfolio-carousel pt-120">
        <div class="bg-img"><img src="{{ asset("assets/front/images/backgrounds/5.jpg") }}" alt="background"></div>
        <div class="container">
            <div class="row mb-60">
                <div class="col-12">
                    <h2 class="heading__subtitle color-primary">Yenilenebilir Enerjide Performansı Artırıyoruz</h2>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <h3 class="heading__title color-white">Tamamlanan Projeler ve Enerji Çözümlerimiz</h3>
                </div><!-- /col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1">
                    <p class="heading__desc font-weight-bold color-gray mb-30">Yenilikçi teknolojilerimiz, müşteri odaklı yaklaşımımız ve uzman ekibimizle enerji sektörüne yön veriyoruz. Geleceği bugünden inşa ediyoruz!</p>
                    <a href="{{ route("services.index") }}" class="btn btn__white btn__outlined">
                        <i class="icon-arrow-right"></i>
                        <span>Değerlerimiz</span>
                    </a>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="carousel-container">
                        <div class="slick-carousel carousel-arrows-light carousel-dots-light"
                             data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows": true, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2 ,"slidesToScroll": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2,"slidesToScroll": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1,"slidesToScroll": 1}}]}'>
                            <!-- portfolio item #1 -->
                            @foreach($projects as $project)
                            <div class="portfolio-item">
                                <div class="portfolio__img">
                                    <img src="{{ asset($project?->image?->path) }}" alt="portfolio img">
                                </div><!-- /.portfolio-img -->
                                <div class="portfolio__body">
                                    <h4 class="portfolio__title"><a href="#">{{ $project->name }}</a></h4>
                                    <a href="{{ route("projects.show", ["project_slug" => $project?->slug]) }}" class="btn btn__primary btn__sm">
                                        <i class="icon-arrow-right"></i>
                                        <span>Devam Et</span>
                                    </a>
                                </div><!-- /.portfolio__body -->
                            </div><!-- /.portfolio-item -->
                            @endforeach
                        </div><!-- /.carousel-->
                        <a href="{{ route("projects.index") }}" class="view-projects d-none d-xl-flex">Projelerimiz</a>
                    </div><!-- /.carousel-container -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.portfolio Layout 3 -->

    <!-- ======================
    Testimonials
    ========================= -->

    <!-- =====================
         Clients
      ======================== -->
    <section class="clients clients-layout2 border-bottom py-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="slick-carousel"
                         data-slick='{"slidesToShow": 3, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 3}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
                        @foreach($references as $reference)
                        <div class="client">
                            <a href="{{ $reference?->url }}"><img src="{{ $reference?->image }}" alt="{{ $reference?->name }}"></a>
                        </div><!-- /.client -->
                        @endforeach
                    </div><!-- /.carousel -->
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <strong class="text-center d-block mt-40">3–5 gün içinde net ve size özel bir teklif almak çok kolay! Doğrudan bizi arayın.
                        <a href="tel:{{ $contact?->phone }}" class="text-underlined-primary">{{ $contact?->phone }}</a>
                    </strong>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.clients -->
@endsection
