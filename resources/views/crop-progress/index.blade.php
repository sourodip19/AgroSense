<x-app-layout>

    <div class="p-8">

        <!-- Header -->
        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-5xl font-bold
                    text-gray-800 dark:text-white">

                    Crop Progress

                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-2">

                    Monitor real-time crop progression analytics.

                </p>

            </div>

            <a href="{{ route('crop-progress.create') }}"

            class="bg-green-600 hover:bg-green-700
                    text-white px-6 py-4 rounded-2xl font-semibold transition">

                ➕ Add Progress

            </a>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            @foreach($progresses as $progress)

                <div class="bg-white dark:bg-[#081526]
                            border border-gray-200 dark:border-gray-800
                            rounded-3xl p-8 shadow-xl">

                    <!-- Top -->
                    <div class="flex items-start justify-between mb-6">

                        <div>

                            <h2 class="text-3xl font-bold
                                    text-gray-800 dark:text-white">

                                {{ $progress->field->field_name }}

                            </h2>

                            <p class="text-gray-500 dark:text-gray-400">

                                🌾 {{ $progress->field->crop_type }}

                            </p>

                        </div>

                        <div class="bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400
                                    px-4 py-2 rounded-xl text-sm font-semibold">

                            {{ $progress->growth_stage }}

                        </div>

                    </div>

                    <!-- Health -->
                    <div class="mb-6">

                        <div class="flex justify-between mb-2">

                            <span class="text-gray-500 dark:text-gray-400">
                                Crop Health
                            </span>

                            <span class="font-bold text-green-500">
                                {{ $progress->health_percentage }}%

@if($progress->health_percentage >= 80)

    <span class="text-green-500 text-sm ml-2">
        Excellent
    </span>

@elseif($progress->health_percentage >= 60)

    <span class="text-blue-500 text-sm ml-2">
        Good
    </span>

@elseif($progress->health_percentage >= 40)

    <span class="text-yellow-500 text-sm ml-2">
        Average
    </span>

@else

    <span class="text-red-500 text-sm ml-2">
        Critical
    </span>

@endif
                            </span>

                        </div>

                        <div class="w-full h-4 rounded-full
                                    bg-gray-200 dark:bg-gray-700">

                            <div class="h-4 rounded-full bg-green-500"style="width: {{ $progress->health_percentage }}%">

                            </div>

                        </div>

                    </div>

                    <!-- Progress -->
                    <div class="mb-6">

                        <div class="flex justify-between mb-2">

                            <span class="text-gray-500 dark:text-gray-400">
                                Growth Progress
                            </span>

                            <span class="font-bold text-blue-500">
                                {{ $progress->progress_percentage }}%
                            </span>

                        </div>

                        <div class="w-full h-4 rounded-full
                                    bg-gray-200 dark:bg-gray-700">

                            <div class="h-4 rounded-full bg-blue-500"style="width: {{ $progress->progress_percentage }}%">

                            </div>

                        </div>

                    </div>

                    <!-- Yield -->
                    <div class="mb-6">

                        <p class="text-gray-500 dark:text-gray-400 mb-2">
                            Predicted Yield
                        </p>

                        <h3 class="text-4xl font-bold
                                text-gray-800 dark:text-white">

                            {{ $progress->predicted_yield }}

                            <span class="text-lg">
                                kg
                            </span>

                        </h3>

                    </div>

                    <!-- Crop Age -->
<div class="mb-6">

    <p class="text-gray-500 dark:text-gray-400 mb-2">
        Crop Age
    </p>

    <h3 class="text-3xl font-bold
               text-gray-800 dark:text-white">

        {{ $progress->crop_age }}

        <span class="text-lg">
            days
        </span>

    </h3>

</div>

                    <!-- Notes -->
                    <div class="bg-gray-50 dark:bg-[#0d1b2e]
                                rounded-2xl p-4">

                        <p class="text-gray-600 dark:text-gray-300">

                            {{ $progress->notes ?? 'No additional notes.' }}

                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>