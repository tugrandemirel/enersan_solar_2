<footer class="footer">
    <div class="footer-primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 footer-widget footer-widget-contact">
                    <h6 class="footer-widget-title">Hızlı İletişim</h6>
                    <div class="footer-widget-content">
                        <p class="mb-20">Herhangi bir sorunuz veya yardıma ihtiyacınız varsa ekibimizle iletişime geçmekten çekinmeyin.</p>
                        <div class="contact__number d-flex align-items-center mb-30">
                            <i class="icon-phone"></i>
                            <a href="tel:{{ $contact?->phone }}" class="color-primary">{{ $contact?->phone }}</a>
                        </div><!-- /.contact__numbr -->
                        <p class="mb-20">{{ $contact?->address }}</p>
                        {{--<a href="#" class="btn__location">
                            <i class="icon-location"></i>
                            <span>Get Directions</span>
                        </a>--}}
                    </div><!-- /.footer-widget-content -->
                </div><!-- /.col-xl-3 -->

                @isset($social_media)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 footer-widget footer-widget-align-right">
                    <h6 class="footer-widget-title">Sosyal Medya</h6>
                    <div class="footer-widget-content">

                        <ul class="social-icons list-unstyled">
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
                    </div><!-- /.footer-widget-content -->
                </div><!-- /.col-xl-3 -->
                @endisset
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-primary -->
    <div class="footer-copyrights">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                    <nav>
                        <ul class="copyright__nav d-flex flex-wrap list-unstyled mb-0">
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </nav>
                    <p class="mb-0">
                        <span class="color-gray">&copy; 2022 {{ $general_setting?->site_name }}, tüm hakları saklıdır. Tasarım</span>
                        <a href="tel:+905443380633">Tuğran Demirel</a>
                    </p>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-copyrights-->
</footer>
