<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GearTrail Machinery | Heavy Equipment Repairs & Truck Hire</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,600,700,800&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased text-gray-900 bg-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

        <!-- Navigation -->
        <nav
            class="fixed w-full z-50 transition-all duration-300 px-6 py-4"
            :class="scrolled ? 'bg-geartrail-dark shadow-xl py-3' : 'bg-transparent'"
        >
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('assets/logo.webp') }}" alt="GearTrail" class="h-10">
                </a>

                <div class="hidden md:flex items-center space-x-8 text-sm font-bold uppercase tracking-widest text-white">
                    <a href="#services" class="hover:text-geartrail-red transition">Services</a>
                    <a href="#gallery" class="hover:text-geartrail-red transition">Gallery</a>
                    <a href="#hire" class="hover:text-geartrail-red transition">Truck Hire</a>
                    <a href="#booking" class="hover:text-geartrail-red transition">Book Now</a>
                    <a href="{{ route('login') }}" class="bg-geartrail-red px-6 py-2.5 rounded-md hover:bg-white hover:text-geartrail-dark transition shadow-lg">Portal</a>
                </div>

                <button class="md:hidden text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative h-screen flex items-center overflow-hidden bg-geartrail-dark">
            <div class="absolute inset-0 z-0 opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r from-geartrail-dark via-transparent to-geartrail-dark"></div>
                <!-- Placeholder for high-quality background image -->
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80&w=2070')"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white space-y-6">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-geartrail-red text-xs font-bold uppercase tracking-widest">Industry Leader in Zimbabwe</span>
                    <h1 class="text-6xl md:text-7xl font-extrabold leading-tight">
                        Powering <span class="text-geartrail-red">Performance</span>,<br>Delivering Reliability.
                    </h1>
                    <p class="text-xl text-gray-300 max-w-lg leading-relaxed">
                        Expert repairs for mining, agriculture, and construction machinery. Fast, reliable field service and UD 80 truck hire solutions.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#booking" class="bg-geartrail-red text-white px-8 py-4 rounded-md text-lg font-bold shadow-2xl hover:scale-105 transition-transform text-center">Schedule a Service</a>
                        <a href="#hire" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-8 py-4 rounded-md text-lg font-bold hover:bg-white hover:text-geartrail-dark transition text-center">Truck Hire Rates</a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-geartrail-red rounded-2xl blur-2xl opacity-20 animate-pulse"></div>
                        <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-2xl shadow-2xl">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center p-4 border-r border-white/10">
                                    <div class="text-3xl font-bold text-geartrail-red">500+</div>
                                    <div class="text-xs text-gray-400 uppercase font-bold mt-1">Jobs Completed</div>
                                </div>
                                <div class="text-center p-4">
                                    <div class="text-3xl font-bold text-geartrail-red">15+</div>
                                    <div class="text-xs text-gray-400 uppercase font-bold mt-1">Years Experience</div>
                                </div>
                                <div class="text-center p-4 border-t border-r border-white/10">
                                    <div class="text-3xl font-bold text-geartrail-red">24/7</div>
                                    <div class="text-xs text-gray-400 uppercase font-bold mt-1">Field Support</div>
                                </div>
                                <div class="text-center p-4 border-t border-white/10">
                                    <div class="text-3xl font-bold text-geartrail-red">99%</div>
                                    <div class="text-xs text-gray-400 uppercase font-bold mt-1">Uptime Rate</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating scroll indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce hidden md:block">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </section>

        <!-- Trust Logos -->
        <div class="bg-gray-50 py-12 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6">
                <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">Trusted by industry giants</p>
                <div class="flex flex-wrap justify-center items-center gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                    <span class="text-2xl font-black text-gray-600">MINING CO.</span>
                    <span class="text-2xl font-black text-gray-600">AGRI-CORP</span>
                    <span class="text-2xl font-black text-gray-600">CONSTRUCT-X</span>
                    <span class="text-2xl font-black text-gray-600">HARVEST-Z</span>
                    <span class="text-2xl font-black text-gray-600">GLOBAL-TECH</span>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <section id="services" class="py-24 px-6 max-w-7xl mx-auto">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-sm font-bold text-geartrail-red uppercase tracking-widest">Capabilities</h2>
                <h3 class="text-4xl font-extrabold text-geartrail-dark">Precision Engineering & Support</h3>
                <p class="text-geartrail-gray max-w-2xl mx-auto text-lg">We provide end-to-end machinery solutions designed to keep your operations running smoothly, no matter the terrain.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group bg-white p-10 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:border-geartrail-red transition-all duration-300">
                    <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-geartrail-red mb-8 group-hover:bg-geartrail-red group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4">Workshop Repairs</h4>
                    <p class="text-gray-500 leading-relaxed">Full diagnostic and component rebuild services for heavy earthmoving machinery, hydraulics, and high-performance diesel engines.</p>
                    <a href="#booking" class="inline-flex items-center mt-6 text-geartrail-red font-bold hover:gap-2 transition-all">Book Inspection <span>&rarr;</span></a>
                </div>

                <!-- Card 2 -->
                <div class="group bg-geartrail-dark p-10 rounded-3xl border border-gray-800 shadow-2xl hover:border-geartrail-red transition-all duration-300 text-white">
                    <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-geartrail-red mb-8 group-hover:bg-geartrail-red group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4">Mobile Workshop</h4>
                    <p class="text-gray-400 leading-relaxed">Equipped for remote Zimbabwe locations. We bring the tools to you for breakdown assistance and rapid on-site maintenance.</p>
                    <a href="#booking" class="inline-flex items-center mt-6 text-geartrail-red font-bold hover:gap-2 transition-all">Request Team <span>&rarr;</span></a>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white p-10 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:border-geartrail-red transition-all duration-300">
                    <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-geartrail-red mb-8 group-hover:bg-geartrail-red group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4">Truck Hire</h4>
                    <p class="text-gray-500 leading-relaxed">Our Nissan UD 80 fleet is available for short and long-term contracts. Heavy-duty reliability for mining and farming logistics.</p>
                    <a href="#hire" class="inline-flex items-center mt-6 text-geartrail-red font-bold hover:gap-2 transition-all">Check Availability <span>&rarr;</span></a>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="py-24 bg-gray-50 border-y border-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                    <div class="space-y-4">
                        <h2 class="text-sm font-bold text-geartrail-red uppercase tracking-widest">Our Work</h2>
                        <h3 class="text-4xl font-extrabold text-geartrail-dark">Project Showcase</h3>
                    </div>
                    <p class="text-geartrail-gray max-w-sm text-sm">Visual evidence of our commitment to excellence and industrial precision.</p>
                </div>

                @livewire('public-gallery')
            </div>
        </section>

        <!-- Interactive Hire Section -->
        <section id="hire" class="py-24 bg-white overflow-hidden relative">
            <div class="absolute right-0 top-0 w-1/3 h-full bg-red-50/50 -skew-x-12 translate-x-24 -z-0"></div>
            <div class="max-w-7xl mx-auto px-6 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-sm font-bold text-geartrail-red uppercase tracking-widest">Logistics</h2>
                        <h3 class="text-4xl font-extrabold text-geartrail-dark">UD 80 Fleet Hire</h3>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Need reliable transport for heavy loads? Our Nissan UD 80 trucks are maintained to the highest standards, ensuring your cargo reaches its destination safely across Zimbabwe.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 font-bold text-geartrail-dark">
                            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Up to 8 Tonne Capacity
                        </li>
                        <li class="flex items-center gap-3 font-bold text-geartrail-dark">
                            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Professional Licensed Drivers
                        </li>
                        <li class="flex items-center gap-3 font-bold text-geartrail-dark">
                            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Cross-Country Deliveries
                        </li>
                    </ul>
                </div>

                <div class="bg-geartrail-dark p-8 md:p-12 rounded-3xl shadow-2xl text-white">
                    <h4 class="text-2xl font-bold mb-6">Estimate Hire Cost</h4>
                    @livewire('truck-hire-calculator')
                </div>
            </div>
        </section>

        <!-- Booking Section -->
        <section id="booking" class="py-24 bg-gray-50 relative overflow-hidden">
            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16 space-y-4">
                    <h2 class="text-sm font-bold text-geartrail-red uppercase tracking-widest">Get Started</h2>
                    <h3 class="text-4xl font-extrabold text-geartrail-dark">Schedule Your Service</h3>
                    <p class="text-geartrail-gray">Complete the form below to book an inspection or field visit.</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                    @livewire('booking-wizard')
                </div>
            </div>
        </section>

        <!-- Testimonial Section -->
        <section class="py-24 bg-geartrail-dark text-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <svg class="w-12 h-12 text-geartrail-red mx-auto mb-8 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V3L21.017 3V15C21.017 18.3137 18.3307 21 15.017 21H14.017ZM3.01705 21L3.01705 18C3.01705 16.8954 3.91248 16 5.01705 16H8.01705C8.56933 16 9.01705 15.5523 9.01705 15V9C9.01705 8.44772 8.56933 8 8.01705 8H5.01705C3.91248 8 3.01705 7.10457 3.01705 6V3L10.0171 3V15C10.0171 18.3137 7.33075 21 4.01705 21H3.01705Z" /></svg>
                <p class="text-3xl md:text-4xl font-bold leading-tight italic max-w-4xl mx-auto mb-10">
                    "GearTrail is the only workshop we trust with our fleet. Their field service team reached us in a remote mine within 4 hours, saving us thousands in downtime."
                </p>
                <div class="flex items-center justify-center gap-4">
                    <div class="w-12 h-12 bg-geartrail-red rounded-full flex items-center justify-center font-bold">JM</div>
                    <div class="text-left">
                        <div class="font-bold">John Maposa</div>
                        <div class="text-sm text-gray-400">Operations Manager, Great Dyke Mining</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white pt-24 pb-12 border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="space-y-6">
                    <img src="{{ asset('assets/logo.webp') }}" alt="GearTrail" class="h-10">
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Setting the standard for heavy machinery maintenance and industrial logistics in Zimbabwe since 2011.
                    </p>
                </div>
                <div>
                    <h5 class="font-bold text-geartrail-dark uppercase text-xs tracking-widest mb-6">Explore</h5>
                    <ul class="space-y-4 text-sm text-gray-500 font-medium">
                        <li><a href="#services" class="hover:text-geartrail-red transition">Our Services</a></li>
                        <li><a href="#gallery" class="hover:text-geartrail-red transition">Project Gallery</a></li>
                        <li><a href="#hire" class="hover:text-geartrail-red transition">Truck Hire</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-geartrail-red transition">Customer Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-geartrail-dark uppercase text-xs tracking-widest mb-6">Contacts</h5>
                    <ul class="space-y-4 text-sm text-gray-500 font-medium">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-geartrail-red" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            +263 772 123 456
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-geartrail-red" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            hello@geartrail.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-geartrail-red" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            Harare, Zimbabwe
                        </li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-geartrail-dark uppercase text-xs tracking-widest mb-6">Emergency</h5>
                    <a href="tel:+263772123456" class="block bg-geartrail-red text-white p-6 rounded-2xl text-center shadow-xl hover:scale-105 transition-transform">
                        <div class="text-xs uppercase font-bold opacity-80 mb-1">24/7 Breakdown</div>
                        <div class="text-xl font-black">+263 772 123 456</div>
                    </a>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-6 pt-12 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-xs text-gray-400 font-medium font-mono uppercase tracking-widest">
                    &copy; {{ date('Y') }} GearTrail Machinery Enterprise. Designed for Uptime.
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-gray-400 hover:text-geartrail-red transition">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-geartrail-red transition">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.805.249 2.227.412.558.217.957.477 1.377.896.419.42.679.819.896 1.377.164.422.358 1.057.412 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.249 1.805-.412 2.227-.217.558-.477.957-.896 1.377-.42.419-.819.679-1.377.896-.422.164-1.057.358-2.227.412-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.805-.249-2.227-.412-.558-.217-.957-.477-1.377-.896-.419-.42-.679-.819-.896-1.377-.164-.422-.358-1.057-.412-2.227-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.054-1.17.249-1.805.412-2.227.217-.558.477-.957.896-1.377.42-.419.819-.679 1.377-.896.422-.164 1.057-.358 2.227-.412 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                </div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
