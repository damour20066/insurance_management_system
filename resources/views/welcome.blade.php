<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insurance Management System</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-700 text-white text-sm font-bold">IM</div>
                    <span class="text-lg font-semibold text-gray-900">InsurePro</span>
                </div>
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                    <a href="#features" class="hover:text-blue-700 transition-colors">Features</a>
                    <a href="#about" class="hover:text-blue-700 transition-colors">About</a>
                    <a href="#contact" class="hover:text-blue-700 transition-colors">Contact</a>
                </nav>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-700 transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-amber-50"></div>
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-amber-200/20 rounded-full blur-3xl"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-sm font-medium mb-6">
                        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                        Trusted by 500+ agencies
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-gray-900 leading-tight">
                        Manage Insurance<br/>
                        <span class="text-blue-700">with Confidence</span>
                    </h1>
                    <p class="mt-6 text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Streamline your client management, policy tracking, and claims processing all in one powerful platform.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3.5 text-base font-semibold text-white bg-blue-700 rounded-xl hover:bg-blue-800 shadow-lg shadow-blue-700/25 hover:shadow-xl hover:shadow-blue-700/30 transition-all duration-200">
                            Start Free Trial
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                        <a href="#features" class="inline-flex items-center px-8 py-3.5 text-base font-semibold text-gray-700 bg-white border-2 border-gray-200 rounded-xl hover:border-blue-200 hover:text-blue-700 transition-all duration-200">
                            Explore Features
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="py-20 lg:py-28 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Everything you need</h2>
                    <p class="mt-4 text-lg text-gray-600">Powerful tools to manage every aspect of your insurance business.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="group p-8 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-100 transition-all duration-300">
                        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-700 transition-colors duration-300">
                            <svg class="w-7 h-7 text-blue-700 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Client Management</h3>
                        <p class="text-gray-600 leading-relaxed">Easily manage client profiles, contact details, and policy histories in one centralized location.</p>
                    </div>
                    <div class="group p-8 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-amber-100 transition-all duration-300">
                        <div class="w-14 h-14 rounded-xl bg-amber-100 flex items-center justify-center mb-5 group-hover:bg-amber-600 transition-colors duration-300">
                            <svg class="w-7 h-7 text-amber-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Policy Tracking</h3>
                        <p class="text-gray-600 leading-relaxed">Track all policy types, premiums, and renewals with automated reminders and status updates.</p>
                    </div>
                    <div class="group p-8 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-100 transition-all duration-300">
                        <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center mb-5 group-hover:bg-green-600 transition-colors duration-300">
                            <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Claims Processing</h3>
                        <p class="text-gray-600 leading-relaxed">Submit, track, and process claims efficiently with a streamlined workflow and real-time updates.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 lg:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight">
                            Why choose<br/>
                            <span class="text-blue-700">InsurePro?</span>
                        </h2>
                        <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                            We provide a comprehensive solution designed specifically for insurance agencies to streamline operations and improve client satisfaction.
                        </p>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Centralized client and policy database</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Real-time claims tracking and updates</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Secure authentication and role-based access</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Automated premium and renewal reminders</span>
                            </li>
                        </ul>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-blue-100 to-amber-100 rounded-3xl blur-2xl opacity-60"></div>
                        <div class="relative bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="flex -space-x-2">
                                    <div class="w-10 h-10 rounded-full bg-blue-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">JD</div>
                                    <div class="w-10 h-10 rounded-full bg-amber-500 border-2 border-white flex items-center justify-center text-white text-xs font-bold">SM</div>
                                    <div class="w-10 h-10 rounded-full bg-green-500 border-2 border-white flex items-center justify-center text-white text-xs font-bold">AK</div>
                                </div>
                                <div class="text-sm text-gray-500">Trusted by industry leaders</div>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Active Policies</div>
                                        <div class="text-2xl font-bold text-blue-700">2,847</div>
                                    </div>
                                    <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Claims Processed</div>
                                        <div class="text-2xl font-bold text-amber-600">1,532</div>
                                    </div>
                                    <div class="w-12 h-12 rounded-lg bg-amber-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Happy Clients</div>
                                        <div class="text-2xl font-bold text-green-600">3,200+</div>
                                    </div>
                                    <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 lg:py-28 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 px-8 py-16 sm:px-16 sm:py-24 text-center">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-amber-400/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                    <div class="relative">
                        <h2 class="text-3xl sm:text-4xl font-bold text-white leading-tight">
                            Ready to transform your<br/>
                            insurance management?
                        </h2>
                        <p class="mt-4 text-lg text-blue-100 max-w-xl mx-auto">
                            Join thousands of agencies already using InsurePro to simplify their workflow.
                        </p>
                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3.5 text-base font-semibold text-blue-900 bg-white rounded-xl hover:bg-blue-50 shadow-lg shadow-black/10 transition-all duration-200">
                                Get Started Free
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            <a href="#contact" class="inline-flex items-center px-8 py-3.5 text-base font-semibold text-white border-2 border-white/30 rounded-xl hover:bg-white/10 transition-all duration-200">
                                Contact Sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="py-20 lg:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">About InsurePro</h2>
                    <p class="mt-4 text-lg text-gray-600">Learn more about our mission and what drives us.</p>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Our Mission</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            InsurePro was founded with a simple mission: to make insurance management effortless for agencies of all sizes. We believe that technology should empower, not complicate.
                        </p>
                        <p class="text-gray-600 leading-relaxed">
                            Our platform combines powerful tools with an intuitive interface, allowing you to focus on what matters most — your clients.
                        </p>
                        <div class="mt-8 grid grid-cols-3 gap-6 text-center">
                            <div>
                                <div class="text-3xl font-bold text-blue-700">500+</div>
                                <div class="text-sm text-gray-500 mt-1">Agencies</div>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-blue-700">10K+</div>
                                <div class="text-sm text-gray-500 mt-1">Policies</div>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-blue-700">99.9%</div>
                                <div class="text-sm text-gray-500 mt-1">Uptime</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Why We Built This</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            After years of working with insurance agencies, we saw a common pattern — outdated systems, manual processes, and frustrated staff. We built InsurePro to solve these challenges once and for all.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Built by insurance professionals</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Trusted by over 500 agencies worldwide</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="text-gray-700">Continuous updates and new features</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="py-20 lg:py-28 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Get in Touch</h2>
                    <p class="mt-4 text-lg text-gray-600">Have questions or need assistance? We're here to help.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Us</h3>
                        <p class="text-gray-600 text-sm">support@insurepro.com</p>
                        <p class="text-gray-600 text-sm">sales@insurepro.com</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Visit Us</h3>
                        <p class="text-gray-600 text-sm">123 Business Avenue</p>
                        <p class="text-gray-600 text-sm">New York, NY 10001</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Call Us</h3>
                        <p class="text-gray-600 text-sm">+1 (555) 123-4567</p>
                        <p class="text-gray-600 text-sm">Mon-Fri 9am-6pm EST</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-700 text-white text-sm font-bold">IM</div>
                        <span class="text-lg font-semibold text-gray-900">InsurePro</span>
                    </div>
                    <p class="text-sm text-gray-600 max-w-sm leading-relaxed">
                        A comprehensive insurance management platform built for modern agencies. Streamline your operations and deliver better service.
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Platform</h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="#features" class="hover:text-blue-700 transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-blue-700 transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-blue-700 transition-colors">Security</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Company</h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="#about" class="hover:text-blue-700 transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-blue-700 transition-colors">Blog</a></li>
                        <li><a href="#contact" class="hover:text-blue-700 transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} InsurePro. All rights reserved.</p>
                <div class="flex items-center gap-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-blue-700 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-700 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
