<div class="card-body">
    <div class="row">
        <div class="col-md-4">
        @if ($service->image?->path)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                Görsel
                <a href="{{ asset($service->image?->path) }}" class="btn btn-sm btn-outline-secondary" download>
                    <i class="fas fa-download"></i> İndir
                </a>
            </div>
        @endif
        </div>
        @if ($service->documents)
            @foreach($service->documents as $document)
        <div class="col-md-4">
            <div class="list-group-item d-flex justify-content-between align-items-center">
                {{ $document?->name ?? 'Belge '. $loop->iteration }}
                <a href="{{ asset($document?->path) }}" class="btn btn-sm btn-outline-secondary" download>
                    <i class="fas fa-download"></i> İndir
                </a>
            </div>
        </div>
            @endforeach
        @endif
    </div>
</div>
