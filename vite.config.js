import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    //server
    server: {
        cors: true,
        //host: "mpm.cswni.server",
        hmr: {
            host: "localhost",
        },
        watch: {
            usePolling: true,
        },
    },
    build: {
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament.css',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
