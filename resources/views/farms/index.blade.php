<x-app-layout>

    <div class="min-h-screen bg-white dark:bg-[#071122] transition duration-300">

        <div class="p-8">

            <!-- TOP SECTION -->
            <div class="flex flex-col md:flex-row md:items-center
                        md:justify-between gap-6 mb-10">

                <div>

                    <h1 class="text-4xl font-bold
                               text-gray-800 dark:text-white">

                        My Farms

                    </h1>

                    <p class="text-gray-500 dark:text-gray-400 mt-2">

                        Manage and monitor all your agricultural farms.

                    </p>

                </div>

                <a href="{{ route('farms.create') }}"

                   class="inline-flex items-center gap-2
                          bg-green-600 hover:bg-green-700
                          text-white font-semibold
                          px-6 py-4 rounded-2xl
                          shadow-lg shadow-green-500/20
                          transition hover:scale-105">

                    ➕ Add New Farm

                </a>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- Total Farms -->
                <div class="bg-white dark:bg-[#081526]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-6 shadow-lg">

                    <p class="text-gray-500 dark:text-gray-400">
                        Total Farms
                    </p>

                    <h2 class="text-4xl font-bold mt-3
                               text-gray-800 dark:text-white">

                        {{ $farms->count() }}

                    </h2>

                </div>

                <!-- Total Area -->
                <div class="bg-white dark:bg-[#081526]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-6 shadow-lg">

                    <p class="text-gray-500 dark:text-gray-400">
                        Total Area
                    </p>

                    <h2 class="text-4xl font-bold mt-3
                               text-gray-800 dark:text-white">

                        {{ $farms->sum('total_area') }}

                        <span class="text-lg font-medium">
                            acres
                        </span>

                    </h2>

                </div>

                <!-- Active Monitoring -->
                <div class="bg-white dark:bg-[#081526]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-6 shadow-lg">

                    <p class="text-gray-500 dark:text-gray-400">
                        Monitoring Status
                    </p>

                    <h2 class="text-2xl font-bold mt-3 text-green-500">

                        Active

                    </h2>

                </div>

            </div>

            <!-- FARMS GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                @forelse($farms as $farm)

                    <div class="bg-white dark:bg-[#081526]
                                border border-gray-200 dark:border-gray-800
                                rounded-3xl p-6 shadow-xl
                                hover:shadow-2xl
                                transition duration-300">

                        <!-- Header -->
                        <div class="flex items-start justify-between mb-6">

                            <div>

                                <h2 class="text-2xl font-bold
                                           text-gray-800 dark:text-white">

                                    {{ $farm->farm_name }}

                                </h2>

                                <p class="text-gray-500 dark:text-gray-400 mt-1">

                                    📍 {{ $farm->location }}

                                </p>

                            </div>

                            <div class="bg-green-100 dark:bg-green-900/30
                                        text-green-700 dark:text-green-400
                                        px-4 py-2 rounded-xl text-sm font-semibold">

                                Active

                            </div>

                        </div>

                        <!-- Area -->
                        <div class="mb-6">

                            <p class="text-gray-500 dark:text-gray-400 mb-2">

                                Farm Area

                            </p>

                            <h3 class="text-3xl font-bold
                                       text-gray-800 dark:text-white">

                                {{ $farm->total_area }}

                                <span class="text-lg font-medium">
                                    acres
                                </span>

                            </h3>

                        </div>

                        <!-- Progress -->
                        <div class="mb-6">

                            <div class="flex justify-between mb-2">

                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    Crop Health
                                </span>

                                <span class="text-sm font-semibold text-green-500">
                                    82%
                                </span>

                            </div>

                            <div class="w-full h-3 rounded-full
                                        bg-gray-200 dark:bg-gray-700">

                                <div class="h-3 rounded-full
                                            bg-green-500 w-[82%]">

                                </div>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4">

                            <a href="#"

                               class="flex-1 text-center
                                      bg-green-600 hover:bg-green-700
                                      text-white py-3 rounded-2xl
                                      font-semibold transition">

                                View Details

                            </a>

                            <a href="#"

                               class="flex-1 text-center
                                      bg-gray-100 dark:bg-[#11233d]
                                      hover:bg-gray-200
                                      dark:hover:bg-[#1a3354]
                                      text-gray-700 dark:text-white
                                      py-3 rounded-2xl
                                      font-semibold transition">

                                Edit

                            </a>

                        </div>

                    </div>

                @empty

                    <!-- Empty State -->
                    <div class="col-span-full">

                        <div class="bg-white dark:bg-[#081526]
                                    border border-dashed
                                    border-gray-300 dark:border-gray-700
                                    rounded-3xl p-16 text-center">

                            <div class="text-7xl mb-6">
                                🌱
                            </div>

                            <h2 class="text-3xl font-bold
                                       text-gray-800 dark:text-white mb-3">

                                No Farms Added Yet

                            </h2>

                            <p class="text-gray-500 dark:text-gray-400 mb-8">

                                Start by adding your first farm to begin
                                monitoring crop progression.

                            </p>

                            <a href="{{ route('farms.create') }}"

                               class="inline-flex items-center gap-2
                                      bg-green-600 hover:bg-green-700
                                      text-white px-8 py-4 rounded-2xl
                                      font-semibold transition">

                                ➕ Create Farm

                            </a>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>