import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/front/app.css',
                'resources/js/front/app.js',
                'resources/css/dashboard/app.css',
                'resources/js/dashboard/app.js'
            ],
            refresh: true,
        }),
    ],
});
