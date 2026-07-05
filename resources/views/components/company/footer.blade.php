<footer class="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h3 class="text-xl font-bold text-red-600 mb-4">{{ $company->company_name }}</h3>
            <p class="text-gray-400 italic mb-4">{{ $company->motto }}</p>
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} {{ $company->company_name }}. All rights reserved.
            </p>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-4 text-white">Contact Us</h4>
            <div class="space-y-2 text-gray-400 text-sm">
                <p>{{ $company->physical_address }}</p>
                <p>Email: <a href="mailto:{{ $company->email }}" class="hover:text-red-600">{{ $company->email }}</a></p>
                @foreach($company->phone_numbers as $phone)
                    <p>Phone: <a href="tel:{{ str_replace(' ', '', $phone) }}" class="hover:text-red-600">{{ $phone }}</a></p>
                @endforeach
            </div>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-4 text-white">Quick Links</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li><a href="/" class="hover:text-red-600">Home</a></li>
                <li><a href="/#about" class="hover:text-red-600">About</a></li>
                <li><a href="/#services" class="hover:text-red-600">Services</a></li>
                <li><a href="/#contact" class="hover:text-red-600">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
