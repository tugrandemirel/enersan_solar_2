import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                "resources/css/custom.css",
                'resources/js/app.js',
                "resources/js/route.js",
                "resources/js/admin/select2.js",
                "resources/js/admin/summernote.js",
                "resources/js/admin/file.js",

                /*START SITE SETTING */
                "resources/js/admin/site-setting/general-setting/update.js",
                "resources/js/admin/site-setting/general-setting/image.js",
                "resources/js/admin/site-setting/contact-setting/update.js",
                "resources/js/admin/site-setting/social-media-setting/update.js",
                "resources/js/admin/site-setting/social-media-setting/repeater.js",
                /* END SITE SETTING */

                /* START SERVICE*/

                "resources/js/admin/service/fetch-services-datatable.js",
                "resources/js/admin/service/setting-store.js",
            ],
            refresh: true,
        }),
    ],
});
