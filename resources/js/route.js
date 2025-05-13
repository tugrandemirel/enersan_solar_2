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
            store: "/admin/services/store",
            index: "/admin/services",
            show: "/admin/services/",
            destroy: "/admin/services/destroy/{service_uuid}",
        }
    }
};

export default routes;
