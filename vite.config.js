import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        // Ensure Vercel can find the built assets
        outDir: 'public/build',
        // Ensure Vercel correctly processes all assets
        assetsDir: '',
        // Generate a manifest for Laravel to use
        manifest: true,
        rollupOptions: {
            // Make sure Vite properly processes CSS
            output: {
                manualChunks: undefined
            }
        }
    },
    // Enable source maps for debugging
    sourcemap: process.env.NODE_ENV !== 'production'
});
