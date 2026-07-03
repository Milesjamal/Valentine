<div class="bg-white min-h-screen">
    <!-- Navigation -->
    <nav class="bg-geartrail-dark p-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <img src="{{ asset('assets/logo.webp') }}" alt="GearTrail" class="h-10">
            <div class="space-x-6 text-white font-medium">
                <a href="#" class="hover:text-geartrail-red">Services</a>
                <a href="#" class="hover:text-geartrail-red">Gallery</a>
                <a href="#" class="hover:text-geartrail-red">Contact</a>
                <a href="{{ route('login') }}" class="bg-geartrail-red px-4 py-2 rounded text-white hover:bg-white hover:text-geartrail-dark transition">Portal Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <header class="bg-gray-100 py-20 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold text-geartrail-dark mb-4">POWERING PERFORMANCE, DELIVERING RELIABILITY</h1>
            <p class="text-xl text-geartrail-gray mb-8">Professional Machinery Supplies and Maintenance for Mining, Agriculture, and Construction.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="bg-geartrail-red text-white px-8 py-3 rounded-lg text-lg font-bold shadow-lg">Book a Service</a>
                <a href="#" class="border-2 border-geartrail-dark text-geartrail-dark px-8 py-3 rounded-lg text-lg font-bold">Our Gallery</a>
            </div>
        </div>
    </header>

    <!-- Services Grid -->
    <section class="py-20 px-4 max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Our Core Expertise</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-geartrail-red">
                <h3 class="text-xl font-bold mb-4">Workshop Repairs</h3>
                <p class="text-gray-600">Full diagnostic and repair services for heavy machinery, hydraulics, and diesel engines.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-geartrail-dark">
                <h3 class="text-xl font-bold mb-4">Mobile Workshop</h3>
                <p class="text-gray-600">On-site breakdown assistance and field maintenance for remote mining and farm sites.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-geartrail-gray">
                <h3 class="text-xl font-bold mb-4">Truck Hire</h3>
                <p class="text-gray-700">Reliable Nissan UD 80 transport solutions for your industrial logistics needs.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-geartrail-dark text-white py-10 text-center">
        <p>&copy; {{ date('Y') }} GearTrail Machinery. All rights reserved.</p>
    </footer>
</div>
