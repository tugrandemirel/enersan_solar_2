<div class="card card-custom card-custom2 bgi-no-repeat gutter-b
@if($project->projectStatus?->code === "active")
border-left-success
@else
border-left-danger
@endif
">
    @include("admin.project.partials.card-info.card-header")
    @include("admin.project.partials.card-info.card-body")
</div>
