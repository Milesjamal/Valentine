<div>
    <h1 class="text-2xl font-bold mb-6">Welcome to GearTrail Machinery</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-geartrail-red">
            <h3 class="text-gray-500 text-sm font-medium">Pending Jobs</h3>
            <p class="text-3xl font-bold">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-geartrail-dark">
            <h3 class="text-gray-500 text-sm font-medium">Active Customers</h3>
            <p class="text-3xl font-bold">{{ \App\Models\Customer::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-geartrail-gray">
            <h3 class="text-gray-500 text-sm font-medium">Active Branches</h3>
            <p class="text-3xl font-bold">{{ \App\Models\Branch::count() }}</p>
        </div>
    </div>
</div>
