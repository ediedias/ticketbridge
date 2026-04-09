<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Check your email</h2>
            <p class="mt-2 text-sm text-gray-500">
                We sent a verification link to your email. Click the link to activate your account.
                If you didn't receive it, we can send another.
            </p>
        </div>

        <div
            v-if="verificationLinkSent"
            class="mb-4 rounded-lg bg-green-50 p-3 text-sm font-medium text-green-700"
        >
            A new verification link has been sent to your email address.
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <div>
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-150 ease-in-out hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="form.processing"
                >
                    <svg v-if="form.processing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ form.processing ? 'Sending...' : 'Resend Verification Email' }}
                </button>
            </div>

            <p class="text-center text-sm text-gray-500">
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="font-semibold text-brand-600 hover:text-brand-500 transition"
                >
                    Log Out
                </Link>
            </p>
        </form>
    </GuestLayout>
</template>
