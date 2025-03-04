import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function asset(prefix: string) {
    const url = document.querySelector('meta[name="application-url"]')?.getAttribute('content')
    return `${url}/${prefix}`
}
export function scrollToElement(elementName: string) {
    setTimeout(()=>{
        const element = document.querySelector(elementName)
        if (element) {
        const y = element.getBoundingClientRect().top + window.scrollY;
        window.scroll({
            top: y,
            behavior: 'smooth'
        });
        }
    },0)
}

export const routeAppendParam = (params: any) => {
    const newUrl = new URL(window.location.href);
    for (const key in params) {
        newUrl.searchParams.set(key, params[key]);
    }
    window.history.pushState({}, '', newUrl);
}

export const getAllQueryParameter = () => {
    const entries = new URL(window.location.href).searchParams.entries();
    const result: any = {}
    for (const [key, value] of entries) {
        result[key] = value;
    }
    return result;
}

export const getQueryParam = (key: string, defaultValue?: string) => {
    return new URLSearchParams(window.location.search).get(key) || (defaultValue || '')
}

export const triggerClick = (element: string) => {
    (document.querySelector(element) as any)?.click()
}
