import { router, usePage } from "@inertiajs/vue3"

export const translate = (key: string) => {
    const translations = usePage().props.translations || {}
    return key.split('.').reduce((o, i) => o?.[i], translations) || key
}


export const switchLang = (lang: string) => {
    router.get(route('switch-lang', { locale: lang }), {}, { replace: true })
}
