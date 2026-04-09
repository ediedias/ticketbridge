<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="TicketBridge - Stop Bad Bug Reports Forever" />
    <div class="bg-white">
        <!-- Header -->
        <header class="bg-white border-b border-gray-100">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">
                    <div class="flex items-center">
                        <Link href="/" class="flex items-center gap-2.5">
                            <ApplicationLogo class="h-8 w-8 text-brand-600" />
                            <span class="text-xl font-bold text-gray-900 tracking-tight">TicketBridge</span>
                        </Link>
                    </div>
                    <div class="flex items-center space-x-3">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                              class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                            Dashboard
                        </Link>
                        <template v-else>
                            <Link :href="route('login')"
                                  class="text-sm font-medium text-gray-600 hover:text-brand-600 transition px-3 py-2">
                                Sign in
                            </Link>
                            <Link v-if="canRegister" :href="route('register')"
                                  class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                Start Free Trial
                            </Link>
                        </template>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-brand-950 to-slate-900 py-24 sm:py-32">
            <!-- Decorative elements (same pattern as auth pages) -->
            <div class="absolute inset-0">
                <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-brand-600/10"></div>
                <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-brand-500/10"></div>
                <div class="absolute top-1/3 right-12 w-32 h-32 rounded-full bg-brand-400/5"></div>
                <div class="absolute top-1/4 left-16 w-24 h-24 rotate-45 rounded-lg border border-brand-400/10"></div>
                <div class="absolute top-20 left-1/3 grid grid-cols-4 gap-3">
                    <div v-for="i in 16" :key="'dot-a-' + i" class="w-1.5 h-1.5 rounded-full bg-brand-300/20"></div>
                </div>
                <div class="absolute bottom-32 right-1/4 grid grid-cols-3 gap-4">
                    <div v-for="i in 9" :key="'dot-b-' + i" class="w-2 h-2 rounded-full bg-brand-400/15"></div>
                </div>
                <div class="absolute top-2/3 left-8 w-40 h-px bg-gradient-to-r from-transparent via-brand-400/30 to-transparent"></div>
                <div class="absolute top-1/2 right-20 w-24 h-px bg-gradient-to-r from-transparent via-brand-300/20 to-transparent rotate-45"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-3 mb-8">
                        <ApplicationLogo class="h-12 w-12 text-brand-400" />
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                        Stop Bad Bug Reports
                        <span class="text-brand-400">Forever</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-brand-200/70 max-w-3xl mx-auto">
                        Turn vague client complaints like "it's broken" into detailed, actionable developer tickets.
                        Our AI asks the right follow-up questions so you don't have to.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link v-if="canRegister" :href="route('register')"
                              class="rounded-lg bg-brand-600 px-6 py-3 text-lg font-semibold text-white shadow-sm transition hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                            Start Free Trial
                        </Link>
                        <a href="#demo" class="text-lg font-semibold leading-6 text-brand-300 hover:text-brand-200 transition">
                            See Demo <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                    <p class="mt-4 text-sm text-brand-200/50">No credit card required. Free while in beta.</p>
                </div>
            </div>
        </section>

        <!-- Problem Section -->
        <section class="py-20 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Sound Familiar?
                    </h2>
                    <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                        Every developer knows the pain of poorly written bug reports.
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.866-.833-2.598 0L4.216 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Vague Bug Reports</h3>
                        <p class="text-gray-500">"The website is broken" or "It doesn't work" — leaving you to guess what actually happened.</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Endless Back & Forth</h3>
                        <p class="text-gray-500">Hours wasted playing 20 questions via email to understand the actual problem.</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-lg bg-yellow-50 flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Lost Context</h3>
                        <p class="text-gray-500">Critical details missing — which browser? What were they doing? Can they reproduce it?</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Solution Section -->
        <section id="demo" class="py-20 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        How TicketBridge Works
                    </h2>
                    <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                        Our AI interviewer asks the right questions to turn client frustration into developer clarity.
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="space-y-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-white font-bold text-sm">1</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-900">Client Reports Issue</h3>
                                    <p class="mt-1 text-gray-500">Your client clicks "Report Problem" on your widget and types: "Login is broken"</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-white font-bold text-sm">2</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-900">AI Asks Follow-ups</h3>
                                    <p class="mt-1 text-gray-500">Our AI immediately asks: "What browser are you using? What error message did you see? What were you trying to log into?"</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-white font-bold text-sm">3</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-900">Perfect Ticket Created</h3>
                                    <p class="mt-1 text-gray-500">You get a structured ticket with title, description, steps to reproduce, and priority level.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:pl-8">
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h4 class="font-semibold mb-4 text-gray-900">Generated Ticket:</h4>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 space-y-3 text-sm">
                                <div><span class="font-medium text-gray-900">Title:</span> <span class="text-gray-600">Login form validation error in Chrome preventing customer portal access</span></div>
                                <div><span class="font-medium text-gray-900">Priority:</span> <span class="bg-orange-100 text-orange-800 px-2 py-0.5 rounded text-xs font-medium">High</span></div>
                                <div><span class="font-medium text-gray-900">Browser:</span> <span class="text-gray-600">Chrome 118.0.5993.70</span></div>
                                <div>
                                    <span class="font-medium text-gray-900">Steps to Reproduce:</span>
                                    <ol class="mt-1 ml-4 list-decimal text-gray-600 space-y-0.5">
                                        <li>Navigate to customer portal login</li>
                                        <li>Enter email: john@company.com</li>
                                        <li>Enter password and click Login</li>
                                        <li>Error: "Invalid credentials" despite correct password</li>
                                    </ol>
                                </div>
                                <div><span class="font-medium text-gray-900">Expected:</span> <span class="text-gray-600">Successfully log into customer dashboard</span></div>
                                <div><span class="font-medium text-gray-900">Actual:</span> <span class="text-gray-600">Login fails with generic error message</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="relative overflow-hidden py-20 bg-gradient-to-br from-brand-950 via-slate-900 to-brand-950">
            <!-- Decorative elements -->
            <div class="absolute inset-0">
                <div class="absolute -top-16 -left-16 w-64 h-64 rounded-full bg-brand-600/10"></div>
                <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-brand-500/10"></div>
                <div class="absolute top-20 right-1/3 grid grid-cols-4 gap-3">
                    <div v-for="i in 16" :key="'dot-c-' + i" class="w-1.5 h-1.5 rounded-full bg-brand-300/20"></div>
                </div>
                <div class="absolute bottom-1/3 left-8 w-40 h-px bg-gradient-to-r from-transparent via-brand-400/30 to-transparent"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-3xl font-bold text-white mb-4">
                        Why Developers Love TicketBridge
                    </h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-brand-500/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Save 3+ Hours Per Bug</h3>
                        <p class="text-brand-200/60">No more email ping-pong. Get all the details you need upfront.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-brand-500/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Fix Issues Faster</h3>
                        <p class="text-brand-200/60">Structured tickets with all context mean faster debugging and resolution.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-brand-500/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Happier Clients</h3>
                        <p class="text-brand-200/60">Clients feel heard and get faster resolutions. No more frustrated phone calls.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        What Developers Are Saying
                    </h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                        <div class="flex items-center gap-0.5 text-brand-500 mb-4">
                            <svg v-for="i in 5" :key="'star-a-' + i" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-4">"This literally saved me 15+ hours last week alone. My clients' bug reports went from useless to actionable overnight."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-brand-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">MJ</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900 text-sm">Mike Johnson</p>
                                <p class="text-xs text-gray-500">Freelance Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                        <div class="flex items-center gap-0.5 text-brand-500 mb-4">
                            <svg v-for="i in 5" :key="'star-b-' + i" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-4">"Our team productivity went up 40% after implementing TicketBridge. No more guessing games with client issues."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-brand-700 rounded-full flex items-center justify-center text-white font-semibold text-sm">SC</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900 text-sm">Sarah Chen</p>
                                <p class="text-xs text-gray-500">CTO, WebStudio</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                        <div class="flex items-center gap-0.5 text-brand-500 mb-4">
                            <svg v-for="i in 5" :key="'star-c-' + i" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-4">"Game changer! My clients love how easy it is to report issues, and I love getting perfect bug reports."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-brand-800 rounded-full flex items-center justify-center text-white font-semibold text-sm">DK</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900 text-sm">David Kim</p>
                                <p class="text-xs text-gray-500">Full-stack Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Simple, Developer-Friendly Pricing
                    </h2>
                    <p class="text-lg text-gray-500">Start free, upgrade when you're convinced</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Free Plan -->
                    <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900">Free Forever</h3>
                            <div class="mt-4 flex items-baseline justify-center">
                                <span class="text-5xl font-bold text-gray-900">$0</span>
                                <span class="ml-1 text-xl text-gray-500">/month</span>
                            </div>
                            <p class="mt-4 text-gray-500">Perfect for trying it out</p>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">1 project</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">25 tickets/month</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">AI-powered bug reports</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">Embeddable widget</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <Link v-if="canRegister" :href="route('register')"
                                  class="w-full block text-center rounded-lg border-2 border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                Start Free
                            </Link>
                        </div>
                    </div>

                    <!-- Pro Plan -->
                    <div class="bg-white rounded-xl border-2 border-brand-600 p-8 relative shadow-sm">
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span class="bg-brand-600 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900">Pro</h3>
                            <div class="mt-4 flex items-baseline justify-center">
                                <span class="text-5xl font-bold text-gray-900">$29</span>
                                <span class="ml-1 text-xl text-gray-500">/month</span>
                            </div>
                            <p class="mt-4 text-gray-500">For serious developers</p>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">Unlimited projects</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">Unlimited tickets</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">Priority support</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">Custom branding</span>
                            </li>
                            <li class="flex items-center">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-brand-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-gray-600">GitHub integration (coming soon)</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <Link v-if="canRegister" :href="route('register')"
                                  class="flex w-full justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-150 ease-in-out hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                Start Pro Trial
                            </Link>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-gray-500">Money-back guarantee: If TicketBridge doesn't save you at least 5 hours in your first month, we'll refund you completely.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="relative overflow-hidden py-20 bg-gradient-to-br from-brand-700 via-brand-600 to-brand-700">
            <!-- Decorative elements -->
            <div class="absolute inset-0">
                <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-white/5"></div>
                <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-white/5"></div>
                <div class="absolute top-1/2 left-1/4 w-24 h-24 rotate-45 rounded-lg border border-white/10"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Ready to Stop Bad Bug Reports?
                </h2>
                <p class="text-xl text-brand-100 mb-8 max-w-2xl mx-auto">
                    Join hundreds of developers who've transformed their bug reporting workflow. Setup takes 2 minutes.
                </p>
                <div class="flex items-center justify-center gap-x-6">
                    <Link v-if="canRegister" :href="route('register')"
                          class="rounded-lg bg-white px-6 py-3 text-lg font-semibold text-brand-600 shadow-sm transition hover:bg-brand-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-brand-600">
                        Start Free Trial
                    </Link>
                    <a href="#" class="text-lg font-semibold leading-6 text-brand-100 hover:text-white transition">
                        Questions? Email us <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
                <p class="text-brand-200 text-sm mt-4">No credit card required. Setup in under 2 minutes.</p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2.5">
                        <ApplicationLogo class="h-6 w-6 text-brand-600" />
                        <span class="text-lg font-bold text-gray-900 tracking-tight">TicketBridge</span>
                    </div>
                    <div class="text-sm text-gray-500">
                        &copy; 2026 TicketBridge. Built by developers, for developers.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
