<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen">
        <!-- Left panel — branded -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-slate-900 via-brand-950 to-slate-900">
            <!-- Decorative elements -->
            <div class="absolute inset-0">
                <!-- Large circle top-right -->
                <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-brand-600/10"></div>
                <!-- Medium circle bottom-left -->
                <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-brand-500/10"></div>
                <!-- Small circle center-right -->
                <div class="absolute top-1/3 right-12 w-32 h-32 rounded-full bg-brand-400/5"></div>
                <!-- Geometric square -->
                <div class="absolute top-1/4 left-16 w-24 h-24 rotate-45 rounded-lg border border-brand-400/10"></div>
                <!-- Dot grid pattern -->
                <div class="absolute top-20 left-1/3 grid grid-cols-4 gap-3">
                    <div v-for="i in 16" :key="i" class="w-1.5 h-1.5 rounded-full bg-brand-300/20"></div>
                </div>
                <!-- Another dot grid -->
                <div class="absolute bottom-32 right-1/4 grid grid-cols-3 gap-4">
                    <div v-for="i in 9" :key="i" class="w-2 h-2 rounded-full bg-brand-400/15"></div>
                </div>
                <!-- Diagonal line accent -->
                <div class="absolute top-2/3 left-8 w-40 h-px bg-gradient-to-r from-transparent via-brand-400/30 to-transparent"></div>
                <!-- Another diagonal accent -->
                <div class="absolute top-1/2 right-20 w-24 h-px bg-gradient-to-r from-transparent via-brand-300/20 to-transparent rotate-45"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center px-12 xl:px-20">
                <!-- Logo + name -->
                <div class="flex items-center gap-3 mb-8">
                    <ApplicationLogo class="h-10 w-10 text-brand-400" />
                    <span class="text-2xl font-bold text-white tracking-tight">TicketBridge</span>
                </div>

                <!-- Tagline -->
                <h1 class="text-3xl xl:text-4xl font-bold text-white leading-tight mb-4">
                    Turn vague bug reports<br />
                    into structured dev tickets
                </h1>
                <p class="text-lg text-brand-200/70 mb-12 max-w-md">
                    Your clients describe problems in plain language. AI transforms them into actionable tickets with steps to reproduce, priority, and complexity.
                </p>

                <!-- Feature highlights -->
                <div class="space-y-5">
                    <div class="flex items-start gap-3">
                        <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                            <svg class="w-3 h-3 text-brand-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white font-medium text-sm">Embeddable widget</p>
                            <p class="text-brand-200/50 text-sm">Drop one script tag into your app</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                            <svg class="w-3 h-3 text-brand-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white font-medium text-sm">AI-powered follow-ups</p>
                            <p class="text-brand-200/50 text-sm">Claude asks the right questions automatically</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                            <svg class="w-3 h-3 text-brand-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white font-medium text-sm">Structured output</p>
                            <p class="text-brand-200/50 text-sm">Priority, complexity, steps to reproduce</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right panel — form -->
        <div class="flex w-full lg:w-1/2 flex-col items-center justify-center bg-white px-6 py-12 sm:px-12">
            <!-- Mobile logo (hidden on lg+) -->
            <div class="lg:hidden mb-8 flex items-center gap-3">
                <Link href="/" class="flex items-center gap-3">
                    <ApplicationLogo class="h-8 w-8 text-brand-600" />
                    <span class="text-xl font-bold text-gray-900 tracking-tight">TicketBridge</span>
                </Link>
            </div>

            <div class="w-full max-w-md">
                <slot />
            </div>
        </div>
    </div>
</template>
