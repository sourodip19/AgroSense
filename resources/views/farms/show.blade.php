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
                <!-- Fields Section -->
<div class="mt-12">

    <div class="flex items-center justify-between mb-8">

        <h2 class="text-3xl font-bold
                   text-gray-800 dark:text-white">

            Farm Fields

        </h2>

        <a href="{{ route('fields.create') }}"

           class="bg-green-600 hover:bg-green-700
                  text-white px-6 py-3
                  rounded-2xl font-semibold
                  transition hover:scale-105">

            + Add Field

        </a>

    </div>

    @if($farm->fields->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach($farm->fields as $field)

                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-8">

                    <!-- Field Name -->
                    <h3 class="text-2xl font-bold
                               text-gray-800 dark:text-white mb-3">

                        {{ $field->field_name }}

                    </h3>

                    <!-- Crop -->
                    <p class="text-gray-500 dark:text-gray-400 mb-2">

                        🌾 Crop:
                        <span class="font-semibold">

                            {{ $field->crop_type }}

                        </span>

                    </p>

                    <!-- Soil -->
                    <p class="text-gray-500 dark:text-gray-400 mb-2">

                        🪨 Soil:
                        <span class="font-semibold">

                            {{ $field->soil_type }}

                        </span>

                    </p>

                    <!-- Irrigation -->
                    <p class="text-gray-500 dark:text-gray-400 mb-2">

                        💧 Irrigation:
                        <span class="font-semibold">

                            {{ $field->irrigation_type }}

                        </span>

                    </p>

                    <!-- Stage -->
                    <p class="text-gray-500 dark:text-gray-400 mb-2">

                        🌱 Stage:
                        <span class="font-semibold text-green-500">

                            {{ $field->growth_stage }}

                        </span>

                    </p>

                    <!-- Sowing -->
                    <p class="text-gray-500 dark:text-gray-400 mb-6">

                        📅 Sowing Date:
                        <span class="font-semibold">

                            {{ $field->sowing_date }}

                        </span>

                    </p>

                    <!-- Buttons -->
                    <div class="flex gap-4">

                        <a href="#"

                           class="flex-1 bg-green-600
                                  hover:bg-green-700
                                  text-white text-center
                                  py-3 rounded-2xl
                                  font-semibold">

                            View Progress

                        </a>

                        <a href="#"

                           class="flex-1 bg-blue-600
                                  hover:bg-blue-700
                                  text-white text-center
                                  py-3 rounded-2xl
                                  font-semibold">

                            Edit

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-yellow-50 dark:bg-yellow-900/20
                    border border-yellow-200 dark:border-yellow-800
                    rounded-3xl p-10 text-center">

            <p class="text-yellow-700 dark:text-yellow-400
                      text-xl font-semibold">

                No fields added yet.

            </p>

        </div>

    @endif

</div>

            </div>

        </div>

    </div>

</x-app-layout>