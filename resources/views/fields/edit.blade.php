<x-app-layout>

    <div class="p-8">

        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="mb-10">

                <h1 class="text-5xl font-bold
                           text-gray-800 dark:text-white">

                    Edit Field

                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-3 text-lg">

                    Update agricultural field information.

                </p>

            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl shadow-2xl p-10">

                <form action="{{ route('fields.update', $field) }}"
                      method="POST"
                      class="space-y-8">

                    @csrf
                    @method('PUT')

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

                                <option value="{{ $farm->id }}"
                                    {{ $field->farm_id == $farm->id ? 'selected' : '' }}>

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
                               value="{{ $field->field_name }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Field Size -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Field Size (Acres)

                        </label>

                        <input type="number"
                               step="0.01"
                               name="field_size"
                               value="{{ $field->field_size }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Crop -->
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

                            <option {{ $field->crop_type == 'Rice' ? 'selected' : '' }}>
                                Rice
                            </option>

                            <option {{ $field->crop_type == 'Wheat' ? 'selected' : '' }}>
                                Wheat
                            </option>

                            <option {{ $field->crop_type == 'Corn' ? 'selected' : '' }}>
                                Corn
                            </option>

                        </select>

                    </div>

                    <!-- Soil -->
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

                            <option {{ $field->soil_type == 'Clay' ? 'selected' : '' }}>
                                Clay
                            </option>

                            <option {{ $field->soil_type == 'Sandy' ? 'selected' : '' }}>
                                Sandy
                            </option>

                            <option {{ $field->soil_type == 'Loamy' ? 'selected' : '' }}>
                                Loamy
                            </option>

                        </select>

                    </div>

                    <!-- Irrigation -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Irrigation Type

                        </label>

                        <select name="irrigation_type"

                                class="w-full rounded-2xl
                                       border border-gray-300
                                       dark:border-gray-700
                                       bg-gray-50 dark:bg-[#0d1b2e]
                                       text-gray-800 dark:text-white
                                       px-6 py-5 text-lg">

                            <option {{ $field->irrigation_type == 'Drip' ? 'selected' : '' }}>
                                Drip
                            </option>

                            <option {{ $field->irrigation_type == 'Sprinkler' ? 'selected' : '' }}>
                                Sprinkler
                            </option>

                            <option {{ $field->irrigation_type == 'Manual' ? 'selected' : '' }}>
                                Manual
                            </option>

                        </select>

                    </div>

                    <!-- Sowing Date -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Sowing Date

                        </label>

                        <input type="date"
                               name="sowing_date"
                               value="{{ $field->sowing_date }}"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Submit -->
                    <button type="submit"

                            class="bg-yellow-500 hover:bg-yellow-600
                                   text-white px-10 py-5
                                   rounded-2xl font-bold
                                   transition hover:scale-105">

                        ✏️ Update Field

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>