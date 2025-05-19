
<!-- ========================= Header =========================== -->
<header class="header header-layout1">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                            <li>
                                <i class="icon-mail"></i>
                                <a href="mailto:{{ $contact?->email }}">Email: {{ $contact?->email }}</a>
                            </li>
                            <li>
                                <i class="icon-clock"></i>
                                <a href="">Pazartesi - Cumartesi: 8:00 - 19:00</a>
                            </li>
                            <li>
                                <i class="icon-location color-primary"></i>
                                <a href="#" class="color-primary">Konum</a>
                            </li>
                        </ul><!-- /.contact__list -->
                        @isset($social_media)
                        <div class="d-flex align-items-center">
                            <ul class="social-icons list-unstyled mb-0 mr-20">
                                @foreach($social_media->links as $social_media)
                                <li>
                                    <a href="{{ $social_media["url"] }}">
                                        @isset($social_media["icon"])
                                            <i class="{{ $social_media["icon"] }}"></i>
                                        @endisset
                                    </a>
                                </li>
                                @endforeach
                            </ul><!-- /.social-icons -->
                        </div>
                        @endisset
                    </div>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("home") }}">
                <img src="{{ $general_setting?->logo["path"] }}" class="logo" alt="{{ $general_setting?->site_name }}" style="max-width: 85px">
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav">
                    <li class="nav__item has-dropdown">
                        <a href="{{ route("home") }}" class="nav__item-link active">Anasayfa</a>
                    </li><!-- /.nav-item -->
                    {{--<li class="nav__item has-dropdown">
                        <a href="#" class="nav__item-link">Şirketimiz</a>
                        <button class="dropdown-toggle" data-toggle="dropdown"></button>
                        <ul class="dropdown-menu">
           --}}{{--                 <li class="nav__item">
                                <a href="" class="nav__item-link">Hakkımızda</a>
                            </li><!-- /.nav-item -->--}}{{--
                            <li class="nav__item">
                                <a href="" class="nav__item-link">Galeri</a>
                            </li>
                            <li class="nav__item">
                                <a href="" class="nav__item-link">SSS</a>
                            </li><!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->--}}
                    <li class="nav__item has-dropdown">
                        <a href="{{ route("services.index") }}" class="nav__item-link">Hizmetlerimiz</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item has-dropdown">
                        <a href="{{ route("projects.index") }}" class="nav__item-link">Projelerimiz</a>
                        <!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{ route("contacts.index") }}" class="nav__item-link">İletişim</a>
                    </li><!-- /.nav-item -->
                </ul><!-- /.navbar-nav -->
                <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
            </div><!-- /.navbar-collapse -->
            @isset($contact?->phone)
            <div class="contact__number d-none d-xl-flex align-items-center">
                <i class="icon-phone"></i>
                <a href="tel:{{ $contact?->phone }}">{{ $contact?->phone }}</a>
            </div>
            @endisset
            <ul class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">
                <li>
                    <a href="{{ route("contacts.index") }}" class="btn btn__primary">
                        <span>İletişime Geç</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                </li>
            </ul><!-- /.navbar-actions -->
        </div><!-- /.container -->
    </nav><!-- /.navabr -->
</header><!-- /.Header -->

