<template>
    <section
        class="z-[10] fixed bottom-0 bg-[#00000085] h-full w-full"
        id="popup-cookie-confirmation"
    >
        <div class="absolute bg-white px-6 py-4 bottom-5 left-6 right-6 lg:w-[80%] lg:mx-auto rounded-xl">
            <div class="flex items-center gap-4 justify-between max-lg:flex-col">
                <div class="w-full lg:w-[950px]">
                    <p class="text-neutral-13 font-medium text-[22px] mb-1">This Site Uses Cookies</p>
                    <p class="text-sm text-neutral-8">
                        By clicking “Accept”, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts. View our
                        <Link :href="route('privacy-policy')" class="text-blue-base font-bold">Privacy Policy</Link>
                        and
                        <Link :href="route('cookies-notice')" class="text-blue-base font-bold">Cookies Notice</Link> for more information.
                    </p>
                </div>
                <div class="flex items-center gap-4 max-lg:justify-center">
                    <a class="w-[99px] rounded-full py-2 bg-fff text-neutral-10 block text-center cursor-pointer" @click="declineCookie">
                        Decline
                    </a>
                    <a class="w-[185px] rounded-full py-2 bg-blue-base text-white font-medium block text-center cursor-pointer" @click="acceptCookie">
                        Accept
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { onMounted, onBeforeUnmount, ref } from "vue";

const props = defineProps<{
    applicationCookie: any;
}>();
const acceptedCookies = ref(props.applicationCookie.map((row: any) => row.id));
const emits = defineEmits(["accept", "decline"]);
const removePopup = () => {
    document.getElementById("popup-cookie-confirmation")?.remove();
    makeScrollBody();
};
const acceptCookie = () => {
    removePopup();
    emits("accept", acceptedCookies.value);
};

const declineCookie = () => {
    removePopup();
    emits("decline");
};

const removeScrollBody = () => {
    document.querySelector("body")?.classList.add("overflow-hidden");
    document.querySelector("body")?.classList.remove("overflow-auto");
};
const makeScrollBody = () => {
    document.querySelector("body")?.classList.add("overflow-auto");
    document.querySelector("body")?.classList.remove("overflow-hidden");
};

onMounted(() => {
    removeScrollBody();
});
onBeforeUnmount(() => {
    makeScrollBody();
});
</script>
