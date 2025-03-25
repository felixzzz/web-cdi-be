import CryptoJS from 'crypto-js'

export default function useCrypto() {
    const encrypt = (payload: string | object | object[] | number | null | any) => {
        if (!payload) {
            return ''
        }
        return CryptoJS.AES.encrypt(
            JSON.stringify(payload),
            import.meta.env.VITE_APP_KEY
        ).toString()
    }

    const decrypt = (ciphertext: string) => {
        if (!ciphertext) {
            return ''
        }
        const bytes = CryptoJS.AES.decrypt(
            ciphertext,
            import.meta.env.VITE_APP_KEY
        )
        const decryptedData = JSON.parse(bytes.toString(CryptoJS.enc.Utf8))
        return decryptedData
    }


    const encryptPhp = (payload: string | object | object[] | number) => {
        return encodeURIComponent(window.btoa(JSON.stringify(payload)))
    }

    const decryptPhp = (payload: string) => {
        return window.atob(decodeURIComponent(payload))
    }
    return {
        encrypt,
        decrypt,
        encryptPhp,
        decryptPhp
    }
}
