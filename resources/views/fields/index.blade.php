<x-app-layout>

    <div class="p-8">

        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-4xl font-bold
                           text-gray-800 dark:text-white">

                    Farm Fields

                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-2">

                    Monitor all agricultural fields.

                </p>

            </div>

            <a href="{{ route('fields.create') }}"

               class="bg-green-600 hover:bg-green-700
                      text-white px-6 py-4 rounded-2xl
                      font-semibold transition">

                ➕ Add Field

            </a>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            @foreach($fields as $field)

                <div class="bg-white dark:bg-[#081526]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-6 shadow-xl">

                    <div class="flex items-start justify-between mb-5">

                        <div>

                            <h2 class="text-2xl font-bold
                                       text-gray-800 dark:text-white">

                                {{ $field->field_name }}

                            </h2>

                            <p class="text-gray-500 dark:text-gray-400">

                                🌾 {{ $field->crop_type }}

                            </p>

                        </div>

                        <div class="bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400
                                    px-4 py-2 rounded-xl text-sm">

                            Active

                        </div>

                    </div>

                    <div class="space-y-3">

                        <p class="text-gray-600 dark:text-gray-300">
                            🏡 Farm:
                            <span class="font-semibold">
                                {{ $field->farm->farm_name }}
                            </span>
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            🌱 Soil:
                            <span class="font-semibold">
                                {{ $field->soil_type }}
                            </span>
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            💧 Irrigation:
                            <span class="font-semibold">
                                {{ $field->irrigation_status }}
                            </span>
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            📅 Sowing:
                            <span class="font-semibold">
                                {{ $field->sowing_date }}
                            </span>
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>