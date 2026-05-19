<x-app-layout>

    <div class="p-8">

        <div class="max-w-4xl mx-auto">

            <h1 class="text-5xl font-bold
                       text-gray-800 dark:text-white mb-10">

                Add Field

            </h1>

            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl shadow-2xl p-10">

                <form action="{{ route('fields.store') }}"
                      method="POST"
                      class="space-y-8">

                    @csrf

                    <!-- Farm -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Select Farm

                        </label>

                        <select name="farm_id"

                                class="w-full rounded-2xl
                                       border border-gray-300
                                       dark:border-gray-700
                                       bg-gray-50 dark:bg-[#0d1b2e]
                                       text-gray-800 dark:text-white
                                       px-6 py-5 text-lg">

                            @foreach($farms as $farm)

                                <option value="{{ $farm->id }}">

                                    {{ $farm->farm_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Field Name -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Field Name

                        </label>

                        <input type="text"
                               name="field_name"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Crop -->
                    <div>

                        <div>

    <label class="block mb-3
                  text-lg font-semibold
                  text-gray-700 dark:text-gray-300">

        Crop Type

    </label>

    <select name="crop_type"

            class="w-full rounded-2xl
                   border border-gray-300
                   dark:border-gray-700
                   bg-gray-50 dark:bg-[#0d1b2e]
                   text-gray-800 dark:text-white
                   px-6 py-5 text-lg">

        <option value="Rice">
            Rice
        </option>

        <option value="Wheat">
            Wheat
        </option>

        <option value="Potato">
            Potato
        </option>

        <option value="Corn">
            Corn
        </option>

        <option value="Sugarcane">
            Sugarcane
        </option>

        <option value="Tomato">
            Tomato
        </option>

        <option value="Mustard">
            Mustard
        </option>

    </select>

</div>

                    </div>

                    <!-- Soil -->
                    <div>

                       <div>

    <label class="block mb-3
                  text-lg font-semibold
                  text-gray-700 dark:text-gray-300">

        Soil Type

    </label>

    <select name="soil_type"

            class="w-full rounded-2xl
                   border border-gray-300
                   dark:border-gray-700
                   bg-gray-50 dark:bg-[#0d1b2e]
                   text-gray-800 dark:text-white
                   px-6 py-5 text-lg">

        <option value="Loamy">
            Loamy
        </option>

        <option value="Clay">
            Clay
        </option>

        <option value="Sandy">
            Sandy
        </option>

        <option value="Silty">
            Silty
        </option>

        <option value="Peaty">
            Peaty
        </option>

        <option value="Chalky">
            Chalky
        </option>

    </select>

</div>

                    </div>

                    <!-- Sowing -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Sowing Date

                        </label>

                        <input type="date"
                               name="sowing_date"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Irrigation -->
                    <div>

                       <div>

    <label class="block mb-3
                  text-lg font-semibold
                  text-gray-700 dark:text-gray-300">

        Irrigation Status

    </label>

    <select name="irrigation_status"

            class="w-full rounded-2xl
                   border border-gray-300
                   dark:border-gray-700
                   bg-gray-50 dark:bg-[#0d1b2e]
                   text-gray-800 dark:text-white
                   px-6 py-5 text-lg">

        <option value="Excellent">
            Excellent
        </option>

        <option value="Good">
            Good
        </option>

        <option value="Average">
            Average
        </option>

        <option value="Poor">
            Poor
        </option>

        <option value="Critical">
            Critical
        </option>

    </select>

</div>

<div>

    <label class="block mb-3
                  text-lg font-semibold
                  text-gray-700 dark:text-gray-300">

        Field Status

    </label>

    <select name="field_status"

            class="w-full rounded-2xl
                   border border-gray-300
                   dark:border-gray-700
                   bg-gray-50 dark:bg-[#0d1b2e]
                   text-gray-800 dark:text-white
                   px-6 py-5 text-lg">

        <option value="Active">
            Active
        </option>

        <option value="Harvesting">
            Harvesting
        </option>

        <option value="Inactive">
            Inactive
        </option>

    </select>

</div>
                        </select>

                    </div>

                    <!-- Submit -->
                    <button type="submit"

                            class="bg-green-600 hover:bg-green-700
                                   text-white font-bold text-lg
                                   px-10 py-5 rounded-2xl
                                   transition hover:scale-105">

                        🌱 Save Field

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>