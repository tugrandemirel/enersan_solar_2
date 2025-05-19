import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                /* START GENERAL */
                'resources/css/app.css',
                "resources/css/custom.css",
                'resources/js/app.js',
                "resources/js/route.js",
                "resources/js/admin/select2.js",
                "resources/js/admin/summernote.js",
                "resources/js/admin/file.js",
                "resources/js/admin/input-mask.js",
                /* END GENERAL */

                /*START SITE SETTING */
                "resources/js/admin/site-setting/general-setting/update.js",
                "resources/js/admin/site-setting/general-setting/image.js",
                "resources/js/admin/site-setting/contact-setting/update.js",
                "resources/js/admin/site-setting/social-media-setting/update.js",
                "resources/js/admin/site-setting/social-media-setting/repeater.js",
                /* END SITE SETTING */

                /* START SERVICE*/
                "resources/js/admin/service/fetch-services-datatable.js",
                "resources/js/admin/service/service-store.js",
                "resources/js/admin/service/service-destroy.js",
                /* END SERVICE*/

                /* START PROJECT*/
                "resources/js/admin/project/fetch-project-datatable.js",
                "resources/js/admin/project/project-destroy.js",
                "resources/js/admin/project/project-store.js",
                /* END PROJECT*/

                /* START SLIDER */
                "resources/js/admin/slider/fetch-sliders-datatable.js",
                "resources/js/admin/slider/slider-store.js",
                "resources/js/admin/slider/slider-destroy.js",
                /* END SLIDER */

                /* START REFERENCE*/
                "resources/js/admin/reference/fetch-references-datatable.js",
                "resources/js/admin/reference/reference-store.js",
                "resources/js/admin/reference/reference-destroy.js",
                /* END REFERENCE*/
            ],
            refresh: true,
        }),
    ],
});
