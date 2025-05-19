/* eslint-disable no-var */
import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';
import { router } from '@inertiajs/vue3';


export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function asset(prefix: string) {
    const url = document.querySelector('meta[name="application-url"]')?.getAttribute('content')
    return `${url}/${prefix}`
}

export function previewFile(prefix?: string) {
    const url = document.querySelector('meta[name="preview-url"]')?.getAttribute('content')
    return `${url}/${prefix}.webp`
}

export function downloadFile(prefix?: string) {
    const url = document.querySelector('meta[name="download-file"]')?.getAttribute('content')
    return `${url}/${prefix}.webp`
}

export function addFilePreview(type?: string, key?: string, selectedLang?: string) {
    const url = document.querySelector('meta[name="add-file-preview"]')?.getAttribute('content')
    const lang = selectedLang ? selectedLang : 'default'
    return `${url}/${lang}/${type}/${key}`
}

export function addFileDownload(type?: string, key?: string, selectedLang?: string) {
    const url = document.querySelector('meta[name="add-file-download"]')?.getAttribute('content')
    const lang = selectedLang ? selectedLang : 'default'
    return `${url}/${lang}/${type}/${key}`
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

export const scrollToSection = (id: string) => {
    const section = document.getElementById(id)
    if (section) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' })
    }
}

export const routeAppendParam = (params: any, appendRoute = true) => {
    const newUrl = new URL(window.location.href);
    for (var key in params) {
        newUrl.searchParams.set(key, params[key]);
    }
    window.history.pushState({}, '', newUrl);

    if (appendRoute) {
        router.visit(newUrl.pathname + newUrl.search, {
            preserveState: true, // Supaya tidak rerender
            replace: true, // Agar tidak menambah entry di history browser
            preserveScroll: true, // Scroll tetap di posisi yang sama
            only: []
        });
    }
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


export const chunkArray = (array: any, chunkSize: any) => {
    return Array.from({ length: Math.ceil(array.length / chunkSize) }, (_, i) =>
        array.slice(i * chunkSize, i * chunkSize + chunkSize)
    );
}

export const showAlert = (message: string, type = 'success') => {
    if (type == 'success') {
        const alert = document.querySelector("#alert-success-message span") as HTMLDivElement
        if (alert) {
            alert.textContent = message
        }
        const button = document.getElementById("show-success-message") as HTMLAnchorElement
        if (button) {
            button.click()
        }
        setTimeout(() => {
            const button = document.getElementById("hide-success-message") as HTMLAnchorElement
            if (button) {
                button.click()
            }
        }, 3000);
    } else {
        const alert = document.querySelector("#alert-error-message span") as HTMLDivElement
        if (alert) {
            alert.textContent = message
        }
        const button = document.getElementById("show-error-message") as HTMLAnchorElement
        if (button) {
            button.click()
        }
        setTimeout(() => {
            const button = document.getElementById("hide-error-message") as HTMLAnchorElement
            if (button) {
                button.click()
            }
        }, 3000);
    }
}
