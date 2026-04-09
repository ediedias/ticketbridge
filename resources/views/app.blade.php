<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'TicketBridge') }}</title>
        
        <!-- SEO Meta Tags -->
        <meta name="description" content="Transform vague client bug reports into structured developer tickets using AI. Stop wasting time on email ping-pong and get actionable bug reports instantly.">
        <meta name="keywords" content="bug reports, developer tools, client management, AI tickets, software development">
        
        <!-- Open Graph -->
        <meta property="og:title" content="TicketBridge - Stop Bad Bug Reports Forever">
        <meta property="og:description" content="Turn vague client complaints into detailed developer tickets with AI-powered follow-up questions.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://ticketbridge.blogtitle.info">
        
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="TicketBridge - Stop Bad Bug Reports Forever">
        <meta name="twitter:description" content="Transform vague bug reports into actionable developer tickets using AI.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>