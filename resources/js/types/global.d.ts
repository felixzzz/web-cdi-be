import { PageProps as InertiaPageProps } from '@inertiajs/core';
import type { InertiaSharedProps } from '@/types/index';

usePage<InertiaSharedProps>();

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps, InertiaSharedProps {}
}

