<x-app-layout>

    <div class="p-8">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-10 shadow-2xl">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <h1 class="text-5xl font-bold
                                   text-gray-800 dark:text-white">

                            {{ $farm->farm_name }}

                        </h1>

                        <p class="text-gray-500 dark:text-gray-400 mt-3">

                            📍 {{ $farm->location }}

                        </p>

                    </div>

                    <div class="bg-green-100 dark:bg-green-900/30
                                text-green-700 dark:text-green-400
                                px-5 py-3 rounded-2xl font-semibold">

                        Active

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="bg-gray-50 dark:bg-[#0d1b2e]
                                rounded-2xl p-6">

                        <p class="text-gray-500 dark:text-gray-400 mb-2">

                            Total Area

                        </p>

                        <h2 class="text-4xl font-bold
                                   text-white">

                            {{ $farm->total_area }} acres

                        </h2>

                    </div>

                    <div class="bg-gray-50 dark:bg-[#0d1b2e]
                                rounded-2xl p-6">

                        <p class="text-gray-500 dark:text-gray-400 mb-2">

                            Created At

                        </p>

                        <h2 class="text-2xl font-bold
                                   text-white">

                            {{ $farm->created_at->format('d M Y') }}

                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>