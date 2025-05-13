<div class="card-body">
    <div class="row g-4">

        {{-- Tekli Görsel --}}
        @if ($project->image?->path)
            <div class="col-md-4 col-sm-6">
                <div class="border rounded shadow-sm p-3 h-100 text-center">
                    <div class="mb-2">
                        <img src="{{ asset($project->image->path) }}" alt="Görsel" class="img-fluid rounded" style="max-height: 150px;">
                    </div>
                    <div>
                        <strong>Kapak Görseli</strong>
                        <a href="{{ asset($project->image->path) }}" download class="btn btn-sm btn-outline-primary d-block mt-2">
                            <i class="fas fa-download me-1"></i> İndir
                        </a>
                    </div>
                </div>
            </div>
        @endif

        {{-- Belgeler --}}
        @if ($project->documents)
            @foreach($project->documents as $document)
                <div class="col-md-4 col-sm-6">
                    <div class="border rounded shadow-sm p-3 h-100 d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-file-alt fa-2x text-muted me-3"></i>
                            <div class="flex-grow-1">
                                <strong>{{ $document->name ?? 'Belge '. $loop->iteration }}</strong>
                            </div>
                        </div>
                        <a href="{{ asset($document->path) }}" class="btn btn-sm btn-outline-secondary mt-auto" download>
                            <i class="fas fa-download me-1"></i> İndir
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Galeri (Çoklu Görseller) --}}
        @if ($project->galleries && $project->galleries->count())
            <div class="col-md-4">
                <h6 class="mb-3">Galeri Resimleri</h6>

                <div class="swiper myGallerySwiper">
                    <div class="swiper-wrapper">
                        @foreach($project->galleries as $gallery)
                            <div class="swiper-slide">
                                <div class="card shadow-sm border rounded h-100 text-center p-2">
                                    <img src="{{ asset($gallery->path) }}"
                                         alt="{{ $gallery->name ?? 'Resim ' . $loop->iteration }}"
                                         class="img-fluid rounded"
                                         style="max-height: 200px; object-fit: contain;">
                                    <div class="mt-2">
                                        <strong class="d-block small">{{ $gallery->name ?? 'Galeri Resmi ' . $loop->iteration }}</strong>
                                        <a href="{{ asset($gallery->path) }}"
                                           class="btn btn-sm btn-outline-secondary mt-1"
                                           download>
                                            <i class="fas fa-download me-1"></i> İndir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider kontrolleri -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        @endif



    </div>
</div>
