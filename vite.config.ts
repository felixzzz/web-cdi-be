import vue from '@vitejs/plugin-vue';
import autoprefixer from 'autoprefixer';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import tailwindcss from '@tailwindcss/vite'
import { defineConfig } from 'vite';
const ASSET_URL = process.env.ASSET_URL || '';

export default defineConfig({
    base: ASSET_URL,
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        tailwindcss()
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js')
        },
    },
    css: {
        postcss: {
            plugins: [autoprefixer],
        },
    },
});
