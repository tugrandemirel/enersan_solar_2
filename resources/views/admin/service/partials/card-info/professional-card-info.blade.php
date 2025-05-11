<div class="card card-custom card-custom2 bgi-no-repeat gutter-b
@if($service->serviceStatus?->code === "active")
border-left-success
@else
border-left-danger
@endif
">
    @include("admin.service.partials.card-info.card-header")
    @include("admin.service.partials.card-info.card-body")
</div>
