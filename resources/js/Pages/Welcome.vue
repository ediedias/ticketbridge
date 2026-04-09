<script setup>
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
        <header class="bg-white shadow-sm">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <!-- Bridge Icon -->
                            <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h1 class="ml-2 text-xl font-bold text-gray-900">TicketBridge</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" 
                              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Dashboard
                        </Link>
                        <template v-else>
                            <Link :href="route('login')" 
                                  class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                Sign in
                            </Link>
                            <Link v-if="canRegister" :href="route('register')" 
                                  class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                Start Free Trial
                            </Link>
                        </template>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        Stop Bad Bug Reports
                        <span class="text-blue-600">Forever</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 max-w-3xl mx-auto">
                        Turn vague client complaints like "it's broken" into detailed, actionable developer tickets. 
                        Our AI asks the right follow-up questions so you don't have to.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link v-if="canRegister" :href="route('register')" 
                              class="rounded-md bg-blue-600 px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            Start Free Trial
                        </Link>
                        <a href="#demo" class="text-lg font-semibold leading-6 text-gray-900">
                            See Demo <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Problem Section -->
        <section class="py-16 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Sound Familiar?
                    </h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                        <div class="text-red-600 mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.866-.833-2.598 0L4.216 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Vague Bug Reports</h3>
                        <p class="text-gray-600">"The website is broken" or "It doesn't work" — leaving you to guess what actually happened.</p>
                    </div>
                    <div class="bg-orange-50 border border-orange-200 rounded-lg p-6">
                        <div class="text-orange-600 mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Endless Back & Forth</h3>
                        <p class="text-gray-600">Hours wasted playing 20 questions via email to understand the actual problem.</p>
                    </div>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                        <div class="text-yellow-600 mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Lost Context</h3>
                        <p class="text-gray-600">Critical details missing — which browser? What were they doing? Can they reproduce it?</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Solution Section -->
        <section id="demo" class="py-16 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        How TicketBridge Works
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Our AI interviewer asks the right questions to turn client frustration into developer clarity.
                    </p>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="space-y-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold">1</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">Client Reports Issue</h3>
                                    <p class="mt-1 text-gray-600">Your client clicks "Report Problem" on your widget and types: "Login is broken"</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold">2</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">AI Asks Follow-ups</h3>
                                    <p class="mt-1 text-gray-600">Our AI immediately asks: "What browser are you using? What error message did you see? What were you trying to log into?"</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold">3</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">Perfect Ticket Created</h3>
                                    <p class="mt-1 text-gray-600">You get a structured ticket with title, description, steps to reproduce, and priority level.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:pl-8">
                        <div class="bg-gray-50 border rounded-lg p-6">
                            <h4 class="font-semibold mb-4 text-gray-900">Generated Ticket:</h4>
                            <div class="bg-white border rounded p-4 space-y-3">
                                <div><span class="font-medium">Title:</span> Login form validation error in Chrome preventing customer portal access</div>
                                <div><span class="font-medium">Priority:</span> <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm">High</span></div>
                                <div><span class="font-medium">Browser:</span> Chrome 118.0.5993.70</div>
                                <div><span class="font-medium">Steps to Reproduce:</span><br>
                                1. Navigate to customer portal login<br>
                                2. Enter email: john@company.com<br>
                                3. Enter password and click Login<br>
                                4. Error: "Invalid credentials" despite correct password</div>
                                <div><span class="font-medium">Expected:</span> Successfully log into customer dashboard</div>
                                <div><span class="font-medium">Actual:</span> Login fails with generic error message</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="py-16 bg-blue-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Why Developers Love TicketBridge
                    </h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Save 3+ Hours Per Bug</h3>
                        <p class="text-gray-600">No more email ping-pong. Get all the details you need upfront.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Fix Issues Faster</h3>
                        <p class="text-gray-600">Structured tickets with all context mean faster debugging and resolution.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Happier Clients</h3>
                        <p class="text-gray-600">Clients feel heard and get faster resolutions. No more frustrated phone calls.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        What Developers Are Saying
                    </h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="text-yellow-400 mb-4">
                            ★★★★★
                        </div>
                        <p class="text-gray-700 mb-4">"This literally saved me 15+ hours last week alone. My clients' bug reports went from useless to actionable overnight."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">MJ</div>
                            <div class="ml-3">
                                <p class="font-semibold">Mike Johnson</p>
                                <p class="text-sm text-gray-600">Freelance Developer</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="text-yellow-400 mb-4">
                            ★★★★★
                        </div>
                        <p class="text-gray-700 mb-4">"Our team productivity went up 40% after implementing TicketBridge. No more guessing games with client issues."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold">SC</div>
                            <div class="ml-3">
                                <p class="font-semibold">Sarah Chen</p>
                                <p class="text-sm text-gray-600">CTO, WebStudio</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="text-yellow-400 mb-4">
                            ★★★★★
                        </div>
                        <p class="text-gray-700 mb-4">"Game changer! My clients love how easy it is to report issues, and I love getting perfect bug reports."</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-semibold">DK</div>
                            <div class="ml-3">
                                <p class="font-semibold">David Kim</p>
                                <p class="text-sm text-gray-600">Full-stack Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-16 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Simple, Developer-Friendly Pricing
                    </h2>
                    <p class="text-lg text-gray-600">Start free, upgrade when you're convinced</p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Free Plan -->
                    <div class="bg-white rounded-lg border-2 border-gray-200 p-8">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900">Free Forever</h3>
                            <div class="mt-4 flex items-baseline justify-center">
                                <span class="text-5xl font-bold text-gray-900">$0</span>
                                <span class="ml-1 text-xl text-gray-600">/month</span>
                            </div>
                            <p class="mt-4 text-gray-600">Perfect for trying it out</p>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">1 project</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">25 tickets/month</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">AI-powered bug reports</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">Embeddable widget</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <Link v-if="canRegister" :href="route('register')" 
                                  class="w-full bg-gray-200 text-gray-900 hover:bg-gray-300 block text-center py-3 px-4 rounded-md font-semibold">
                                Start Free
                            </Link>
                        </div>
                    </div>

                    <!-- Pro Plan -->
                    <div class="bg-white rounded-lg border-2 border-blue-600 p-8 relative">
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900">Pro</h3>
                            <div class="mt-4 flex items-baseline justify-center">
                                <span class="text-5xl font-bold text-gray-900">$29</span>
                                <span class="ml-1 text-xl text-gray-600">/month</span>
                            </div>
                            <p class="mt-4 text-gray-600">For serious developers</p>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">Unlimited projects</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">Unlimited tickets</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">Priority support</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">Custom branding</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3">GitHub integration (coming soon)</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <Link v-if="canRegister" :href="route('register')" 
                                  class="w-full bg-blue-600 text-white hover:bg-blue-700 block text-center py-3 px-4 rounded-md font-semibold">
                                Start Pro Trial
                            </Link>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-gray-600">💰 <strong>Money-back guarantee:</strong> If TicketBridge doesn't save you at least 5 hours in your first month, we'll refund you completely.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-blue-600">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Ready to Stop Bad Bug Reports?
                </h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Join hundreds of developers who've transformed their bug reporting workflow. Setup takes 2 minutes.
                </p>
                <div class="flex items-center justify-center gap-x-6">
                    <Link v-if="canRegister" :href="route('register')" 
                          class="rounded-md bg-white px-6 py-3 text-lg font-semibold text-blue-600 shadow-sm hover:bg-gray-100">
                        Start Free Trial
                    </Link>
                    <a href="#" class="text-lg font-semibold leading-6 text-white">
                        Questions? Email us <span aria-hidden="true">→</span>
                    </a>
                </div>
                <p class="text-blue-200 text-sm mt-4">No credit card required • Setup in under 2 minutes</p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white border-t">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="ml-2 text-lg font-bold text-gray-900">TicketBridge</span>
                    </div>
                    <div class="text-sm text-gray-500">
                        © 2024 TicketBridge. Built by developers, for developers.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>