<x-app-layout>

    <div class="p-8">

        <div class="max-w-4xl mx-auto">

            <!-- Page Header -->
            <div class="mb-10">

                <h1 class="text-5xl font-bold
                           text-gray-800 dark:text-white mb-3">

                    Add Farm

                </h1>

                <p class="text-lg
                          text-gray-500 dark:text-gray-400">

                    Fill in the details below to create a new farm.

                </p>

            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl shadow-2xl p-10">

                <form action="{{ route('farms.store') }}"
                      method="POST"
                      class="space-y-8">

                    @csrf

                    <!-- Farm Name -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Farm Name

                        </label>

                        <input type="text"
                               name="farm_name"
                               placeholder="Enter farm name"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700

                                      bg-gray-50
                                      dark:bg-[#0d1b2e]

                                      text-gray-800
                                      dark:text-white

                                      px-6 py-5
                                      text-lg

                                      focus:ring-2
                                      focus:ring-green-500

                                      outline-none
                                      transition">

                    </div>

                    <!-- Location -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Location

                        </label>

                        <input type="text"
                               name="location"
                               placeholder="Enter farm location"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700

                                      bg-gray-50
                                      dark:bg-[#0d1b2e]

                                      text-gray-800
                                      dark:text-white

                                      px-6 py-5
                                      text-lg

                                      focus:ring-2
                                      focus:ring-green-500

                                      outline-none
                                      transition">

                    </div>

                    <!-- Area -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Total Area (Acres)

                        </label>

                        <input type="number"
                               step="0.01"
                               name="total_area"
                               placeholder="Enter total area"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700

                                      bg-gray-50
                                      dark:bg-[#0d1b2e]

                                      text-gray-800
                                      dark:text-white

                                      px-6 py-5
                                      text-lg

                                      focus:ring-2
                                      focus:ring-green-500

                                      outline-none
                                      transition">

                    </div>

                    <!-- Submit -->
                    <button type="submit"

                            class="bg-green-600
                                   hover:bg-green-700

                                   text-white
                                   font-bold
                                   text-lg

                                   px-10 py-5
                                   rounded-2xl

                                   shadow-lg
                                   shadow-green-500/20

                                   transition
                                   hover:scale-105">

                        🌱 Save Farm

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>