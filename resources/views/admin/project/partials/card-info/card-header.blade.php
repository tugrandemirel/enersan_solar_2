<div class="card-header ribbon ribbon-top">
    <div class="card-title">
        <!--begin::Info-->
        <div class="d-flex flex-column mr-auto">
            <!--begin: Title-->
            <a href="javascript:void(0)" id="project_id" class="card-title text-hover-primary font-weight-bolder font-size-h3 text-dark mb-2 mt-xs-10" data-value="57" data-label="851f669b-0a64-4f14-8925-dbdea6b2756b">
               {{ $project?->name }}
            </a>
            <div class="d-flex flex-wrap">
                <div class="d-none d-md-block align-items-center pr-5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Oluşturulma Tarihi">
                    <i class="fas fa-clock icon-nm text-primary mr-2"></i>
                    <span class="font-size-sm">{{ $project?->created_at_formatted}}</span>
                </div>
                <div class="d-none d-md-block align-items-center pr-5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Oluşturan Kullanıcı">
                    <i class="fas fa-user icon-nm text-primary mr-2"></i>
                    <span class="font-size-sm">{{ $project->createdByUser?->name }}</span>
                </div>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
</div>
