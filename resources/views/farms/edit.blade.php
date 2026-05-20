<x-app-layout>

    <div class="p-8">

        <div class="max-w-4xl mx-auto">

            <h1 class="text-5xl font-bold
                       text-gray-800 dark:text-white mb-10">

                Edit Farm

            </h1>

            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl shadow-2xl p-10">

                <form action="{{ route('farms.update', $farm) }}"
                      method="POST"
                      class="space-y-8">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Farm Name

                        </label>

                        <input type="text"
                               name="farm_name"
                               value="{{ $farm->farm_name }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

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
                               value="{{ $farm->location }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Area -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Total Area

                        </label>

                        <input type="number"
                               name="total_area"
                               value="{{ $farm->total_area }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <button type="submit"

                            class="bg-green-600 hover:bg-green-700
                                   text-white px-10 py-5
                                   rounded-2xl font-bold
                                   transition hover:scale-105">

                        💾 Update Farm

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>