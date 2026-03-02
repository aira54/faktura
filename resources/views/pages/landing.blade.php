<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktura - Invoice Automation</title>

    @vite('resources/css/app.css')

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fakturaicon.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/fakturaicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
</head>

<body class="bg-gradient-to-br from-emerald-100 via-teal-200 to-blue-200">

    {{-- NAVBAR --}}
    <x-landing.navbar />

    <main class="flex flex-col">

        {{-- HERO --}}
        <x-landing.hero />

        {{-- FEATURES --}}
        <x-landing.features />

        {{-- CTA --}}
        <x-landing.cta />

        {{-- PRICING --}}
        <x-landing.pricing />

        {{-- FAQ --}}
        <x-landing.faq />

    </main>

    {{-- FOOTER --}}
    <x-landing.footer />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
