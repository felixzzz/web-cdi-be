import { PageProps as InertiaPageProps } from '@inertiajs/core';
import { AxiosInstance } from 'axios';
import {route as ziggyRoute, Config as ZiggyConfig } from 'ziggy-js';
import type { InertiaSharedProps } from '@/types/index';

usePage<InertiaSharedProps>();


declare global {
    interface Window {
        axios: AxiosInstance;
        route: ziggyRoute;
        gtag: (...args: any[]) => void;
    }

    /* eslint-disable no-var */
    var route: typeof ziggyRoute;
    var Ziggy: ZiggyConfig;
    var $t: (key: string) => string;
}

declare module 'vue' {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
        $t: (key: string) => string;
    }
}

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps, InertiaSharedProps {}
}

