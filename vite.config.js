import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'resources/login-assets/css/main.css',
                'resources/login-assets/css/util.css',
                'resources/login-assets/vendor/bootstrap/css/bootstrap.min.css',
                'resources/login-assets/vendor/css-hamburgers/hamburgers.min.css',
                'resources/login-assets/vendor/animate/animate.css',
                'resources/login-assets/vendor/select2/select2.min.css',
                'resources/login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css',


                'resources/login-assets/js/main.js',
                'resources/login-assets/vendor/bootstrap/js/popper.js',
                'resources/login-assets/vendor/bootstrap/js/bootstrap.min.js',
            ],
            refresh: true,
        }),
    ],
});
