<div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900">Mandatory 2FA Setup</h3>
        <p class="mt-1 text-sm text-gray-600">
            For security reasons, all staff members must enable two-factor authentication to access the GearTrail platform.
        </p>

        <div class="mt-5">
            @if (! auth()->user()->two_factor_secret)
                <form method="POST" action="/user/two-factor-authentication">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-geartrail-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-geartrail-dark active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Enable Two-Factor Authentication
                    </button>
                </form>
            @elseif (! auth()->user()->two_factor_confirmed_at)
                 <div class="mt-4">
                    <p class="text-sm font-bold text-geartrail-red mb-4">Finalize Setup: Scan the QR code in your authenticator app and enter the code.</p>
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}

                    <form method="POST" action="/user/confirmed-two-factor-authentication" class="mt-4">
                        @csrf
                        <input type="text" name="code" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" placeholder="Enter 6-digit code">
                        <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            Confirm 2FA
                        </button>
                    </form>
                </div>
            @else
                <div class="text-green-600 font-bold">
                    Two-factor authentication is enabled and confirmed.
                    <a href="{{ route('dashboard') }}" class="underline ml-4 text-geartrail-dark">Go to Dashboard</a>
                </div>
            @endif
        </div>
    </div>
</div>
