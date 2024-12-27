import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/landing.css',
                'resources/js/landing.js',
            ],
            refresh: true,
        }),
    ],
});
