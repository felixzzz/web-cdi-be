import '../css/app.css';

import axios from 'axios';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue, route } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia'

import Alpine from 'alpinejs'
import { translate } from './Composables/useTranslation';
Alpine.start()

const pinia = createPinia()

// Extend ImportMeta interface for Vite...
// declare module 'vite/client' {
//     interface ImportMetaEnv {
//         readonly VITE_APP_NAME: string;
//         [key: string]: string | boolean | undefined;
//     }

//     interface ImportMeta {
//         readonly env: ImportMetaEnv;
//         readonly glob: <T>(pattern: string) => Record<string, () => Promise<T>>;
//     }
// }

window.route = (name: string, params?: any, absolute?: boolean) => route(name, params, absolute, Ziggy)
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
window.$t = translate;

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${appName} | ${title}`,
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            app.config.globalProperties.$page = props.initialPage;
            app.config.globalProperties.$t = translate;

            app.use(plugin)
            app.use(pinia)
            app.use(ZiggyVue, Ziggy)
            app.mount(el);
    },
    progress: {
        color: '#2474A5',
    },
});
