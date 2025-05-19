@extends("front.layouts.app")
@section("title", "Enersan Solar | İletişim")
@section("content")
    <!-- =========================
            Google Map
    =========================  -->
    <section class="google-map py-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d522.8190743969957!2d32.47706872249558!3d37.86331783355855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d08fc185899d2d%3A0xd0f3916a7b7c9c31!2sENERSAN%20SOLAR%20DANI%C5%9EMANLIK%20LTD.%C5%9ET%C4%B0!5e0!3m2!1sen!2str!4v1747674111198!5m2!1sen!2str" height="500" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section><!-- /.GoogleMap -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section class="contact-layout1 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-panel p-0 box-shadow-none">
                        <div class="contact__panel-info mb-30">
                            <div class="contact-info-box">
                                <h4 class="contact__info-box-title">Adres</h4>
                                <ul class="contact__info-list list-unstyled">
                                    <li>{{ $contact?->address }}</li>
                                </ul><!-- /.contact__info-list -->
                            </div><!-- /.contact-info-box -->
                            <div class="contact-info-box">
                                <h4 class="contact__info-box-title">Telefon</h4>
                                <ul class="contact__info-list list-unstyled">
                                    <li>{{ $contact?->phone }}</li>
                                </ul><!-- /.contact__info-list -->
                            </div><!-- /.contact-info-box -->
                            <div class="contact-info-box">
                                <h4 class="contact__info-box-title">Hızlı İletişim</h4>
                                <ul class="contact__info-list list-unstyled">
                                    <li>Email: <a href="mailto:{{ $contact?->email }}">{{ $contact?->email }}</a></li>
                                </ul><!-- /.contact__info-list -->
                            </div><!-- /.contact-info-box -->
                            <div class="contact-info-box">
                                <h4 class="contact__info-box-title">Çalışma Saatleri</h4>
                                <ul class="contact__info-list list-unstyled">
                                    <li>Pazartesi - Cumartesi</li>
                                    <li>8.00 - 19-00</li>
                                </ul><!-- /.contact__info-list -->
                            </div><!-- /.contact-info-box -->
                            <a href="tel:{{ $contact?->phone }}" class="btn btn__primary">
                                <i class="icon-arrow-right"></i>
                                <span>İletişime Geçin</span>
                            </a>
                        </div><!-- /.contact__panel-info -->
                        <form id="customer_contact_form" class="contact__panel-form mb-30">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact__panel-title">İletişim Formu</h4>
                                    <p class="contact__panel-desc mb-40">Ürünler üzerinde tam kontrol, müşterilerimizin en iyi kalitede fiyat ve hizmeti almasını sağlamamıza olanak tanır. Fabrikamızda yaptığımız her şeyden büyük gurur duyuyoruz.</p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Adınız Soyadınız" name="name" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" id="Email Adresiniz" name="email" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Telefon Numaranız" id="" name="phone" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <textarea class="form-control" placeholder="Mesajınız" id="" name="content" required></textarea>
                                    </div>
                                </div><!-- /.col-lg-12 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <button type="button" class="btn btn__secondary" id="contact_btn">
                                        <i class="icon-arrow-right"></i><span>Gönder</span>
                                    </button>
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.contact__panel -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->

@endsection
@push("js")

    <script src="{{ asset('assets/admin/js/notification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite([
        "resources/js/front/contact-store.js"
    ])
@endpush
