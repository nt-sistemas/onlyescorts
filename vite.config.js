import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/css/lightbox.css', 'resources/js/app.js','resources/js/lightbox.js','resources/js/lightbox-plus-jquery.js'],
            refresh: true,
        }),
    ],
});
