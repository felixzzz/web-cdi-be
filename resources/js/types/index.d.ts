export interface InertiaSharedProps {
    name: string;
    career_url: string;
    quote: {
        message: string;
        author: string;
    };
    ziggy: {
        location: string;
        url: string;
        port: null | number;
        defaults: Record<string, unknown>;
        routes: Record<string, string>;
    };
}
