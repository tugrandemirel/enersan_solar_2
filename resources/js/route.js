const routes = {
    admin: {
        settings: {
            general_setting : {
                update : "/admin/site-setting/general-setting",
            },
            contact_setting : {
                update : "/admin/site-setting/contact-setting",
            },
            social_media_setting : {
                update : "/admin/site-setting/social-media-setting",
            },
        },
        services: {
            index: "/admin/services",
            store: "/admin/services/store",
            show: "/admin/services/{service_uuid}",
            destroy: "/admin/services/destroy/{service_uuid}",
        },
        projects: {
            index: "/admin/projects",
            store: "/admin/projects/store",
            show: "/admin/projects/{project_uuid}",
            destroy: "/admin/projects/destroy/{project_uuid}",
        },
        sliders: {
            index: "/admin/sliders",
            store: "/admin/sliders/store",
            show: "/admin/sliders/{slider_uuid}",
            destroy: "/admin/sliders/destroy/{slider_uuid}",
        },
        references: {
            index: "/admin/references",
            store: "/admin/references/store",
            show: "/admin/references/{reference_uuid}",
            destroy: "/admin/references/destroy/{reference_uuid}",
        },
    },
    front: {
        contact: {
            store: "/iletisim/",
        },
        home: {
            index: "/",
        }
    },
};

export default routes;
