<div class="modal fade" id="sliderCreateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="create_slider_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sub_title">Küçük Başlık</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="main_title">Ana Başlık</label>
                                <input type="text" class="form-control" id="main_title" name="main_title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desc">Açıklama</label>
                                <input type="text" class="form-control" id="desc" name="desc">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_link_one">Birinci Buton Link</label>
                                <input type="text" class="form-control" id="button_link_one" name="button_link_one">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_one_text">Birinci Buton Yazısı</label>
                                <input type="text" class="form-control" id="button_one_text" name="button_one_text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_link_two">İkinci Buton Link</label>
                                <input type="text" class="form-control" id="button_link_two" name="button_link_two">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_two_text">İkinci Buton Yazısı</label>
                                <input type="text" class="form-control" id="button_two_text" name="button_two_text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label>Görsel Yükle</label>
                            <div class="file-upload-wrapper">
                                <button type="button" class="btn btn-primary btn-block upload-btn">Görsel Yükle</button>
                                <input type="file" name="image" accept="image/*" class="d-none file-input" data-type="image">
                                <div class="file-preview d-none position-relative mt-3"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="button" id="create_slider_btn" class="btn btn-primary font-weight-bold">Kaydet</button>
            </div>
        </div>
    </div>
</div>
