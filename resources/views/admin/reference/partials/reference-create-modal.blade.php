<div class="modal fade" id="referenceCreateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yeni Referans</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="create_reference_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Başlık</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url">
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
                <button type="button" id="create_reference_btn" class="btn btn-primary font-weight-bold">Kaydet</button>
            </div>
        </div>
    </div>
</div>
