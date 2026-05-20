<x-app-layout>

    <div class="p-8">

        <!-- HEADER -->
        <div class="mb-10">

            <h1 class="text-5xl font-bold
                       text-gray-800 dark:text-white">

                Smart Agriculture Dashboard

            </h1>

            <p class="text-gray-500 dark:text-gray-400 mt-3 text-lg">

                Real-time crop progression analytics and insights.

            </p>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 mb-10">

            <!-- Farms -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-8 shadow-xl">

                <p class="text-gray-500 dark:text-gray-400">
                    Total Farms
                </p>

                <h2 class="text-5xl font-bold mt-4
                           text-green-500">

                    {{ $farms }}

                </h2>

            </div>

            <!-- Fields -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-8 shadow-xl">

                <p class="text-gray-500 dark:text-gray-400">
                    Active Fields
                </p>

                <h2 class="text-5xl font-bold mt-4
                           text-blue-500">

                    {{ $fields }}

                </h2>

            </div>

            <!-- Health -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-8 shadow-xl">

                <p class="text-gray-500 dark:text-gray-400">
                    Average Health
                </p>

                <h2 class="text-5xl font-bold mt-4
                           text-yellow-500">

                    {{ round($averageHealth) }}%

                </h2>

            </div>

            <!-- Yield -->
            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-8 shadow-xl">

                <p class="text-gray-500 dark:text-gray-400">
                    Predicted Yield
                </p>

                <h2 class="text-5xl font-bold mt-4
                           text-purple-500">

                    {{ round($totalYield) }}

                    <span class="text-lg">
                        kg
                    </span>

                </h2>

            </div>

        </div>
<!-- WEATHER SECTION -->
<div class="bg-white dark:bg-[#081526]
            border border-gray-200 dark:border-gray-800
            rounded-3xl p-8 shadow-xl mb-10">

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold
                       text-gray-800 dark:text-white">

                Live Weather Monitoring

            </h2>
           <div class="space-y-2">

    <p class="text-gray-400 text-lg">

        {{ now()->format('d M Y • h:i A') }}

    </p>

    <p class="text-green-400 font-semibold text-lg">

        📍 {{ $weather['name'] }}

    </p>

</div>
            <p class="text-gray-500 dark:text-gray-400 mt-2">

                Real-time environmental conditions.

            </p>

        </div>

        <div class="text-6xl">
            ☁️
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Temperature -->
        <div class="bg-gray-50 dark:bg-[#0d1b2e]
                    rounded-2xl p-6">

            <p class="text-gray-500 dark:text-gray-400 mb-2">
                Temperature
            </p>

            <h3 class="text-4xl font-bold text-red-500">

                {{ round($weather['main']['temp'] ?? 0) }}°C

            </h3>

        </div>

        <!-- Humidity -->
        <div class="bg-gray-50 dark:bg-[#0d1b2e]
                    rounded-2xl p-6">

            <p class="text-gray-500 dark:text-gray-400 mb-2">
                Humidity
            </p>

            <h3 class="text-4xl font-bold text-blue-500">

                {{ $weather['main']['humidity'] ?? 0 }}%

            </h3>

        </div>

        <!-- Wind -->
        <div class="bg-gray-50 dark:bg-[#0d1b2e]
                    rounded-2xl p-6">

            <p class="text-gray-500 dark:text-gray-400 mb-2">
                Wind Speed
            </p>

            <h3 class="text-4xl font-bold text-green-500">

                {{ $weather['wind']['speed'] ?? 0 }}

            </h3>

        </div>

        <!-- Condition -->
        <div class="bg-gray-50 dark:bg-[#0d1b2e]
                    rounded-2xl p-6">

            <p class="text-gray-500 dark:text-gray-400 mb-2">
                Condition
            </p>

            <h3 class="text-2xl font-bold text-yellow-500">

                {{ $weather['weather'][0]['main'] ?? 'N/A' }}

            </h3>

        </div>

    </div>

</div>
        <!-- CHART + INSIGHTS -->
       <!-- AI ANALYTICS SECTION -->
@if($progresses->count())

    @php
        $latest = $progresses->first();
    @endphp

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-10">

        <!-- LEFT SIDE -->
        <div class="xl:col-span-2
                    bg-white dark:bg-[#081526]
                    border border-gray-200 dark:border-gray-800
                    rounded-3xl p-8 shadow-xl">

            <div class="flex items-center justify-between mb-8">

                <div>

                    <h2 class="text-3xl font-bold
                               text-gray-800 dark:text-white">

                        Crop Health Analytics

                    </h2>

                    <p class="text-gray-500 dark:text-gray-400 mt-2">

                        AI-powered crop monitoring insights.

                    </p>

                </div>

                <div class="text-5xl">
                    🌿
                </div>

            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Health -->
                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-6">

                    <p class="text-gray-500 dark:text-gray-400">
                        AI Health Score
                    </p>

                    <h3 class="text-5xl font-bold
                               text-green-500 mt-3">

                        {{ $latest->ai_health_score }}%

                    </h3>

                </div>

                <!-- Disease -->
                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-6">

                    <p class="text-gray-500 dark:text-gray-400">
                        Detected Disease
                    </p>

                    <h3 class="text-2xl font-bold
                               text-red-500 mt-3">

                        {{ $latest->ai_disease }}

                    </h3>

                </div>

                <!-- Risk -->
                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-6">

                    <p class="text-gray-500 dark:text-gray-400">
                        Risk Level
                    </p>

                    <h3 class="text-3xl font-bold
                               text-yellow-500 mt-3">

                        {{ $latest->ai_risk_level }}

                    </h3>

                </div>

                <!-- Yield -->
                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-6">

                    <p class="text-gray-500 dark:text-gray-400">
                        Predicted Yield
                    </p>

                    <h3 class="text-3xl font-bold
                               text-purple-500 mt-3">

                        {{ round($latest->predicted_yield) }}kg

                    </h3>

                </div>

            </div>

            <!-- Recommendation -->
            <div class="mt-8
                        bg-gradient-to-r
                        from-green-500/10
                        to-blue-500/10
                        border border-green-500/20
                        rounded-3xl p-8">

                <h3 class="text-2xl font-bold
                           text-white mb-4">

                    🤖 AI Recommendation

                </h3>

                <p class="text-gray-300 text-lg leading-relaxed">

                    {{ $latest->ai_recommendation }}

                </p>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="bg-white dark:bg-[#081526]
                    border border-gray-200 dark:border-gray-800
                    rounded-3xl p-8 shadow-xl">

            <h2 class="text-2xl font-bold
                       text-gray-800 dark:text-white mb-6">

                Uploaded Crop

            </h2>

            @if($latest->crop_image)

                <img
                    src="{{ asset('storage/' . $latest->crop_image) }}"
                    class="w-full h-80
                           object-cover
                           rounded-3xl
                           border border-gray-800"
                >

            @endif

            <div class="mt-6 space-y-4">

                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-4">

                    <p class="text-gray-400 text-sm">
                        Crop Condition
                    </p>

                    <p class="text-white font-bold text-lg mt-1">

                        {{ $latest->crop_condition }}

                    </p>

                </div>

                <div class="bg-gray-50 dark:bg-[#0d1b2e]
                            rounded-2xl p-4">

                    <p class="text-gray-400 text-sm">
                        Visible Issue
                    </p>

                    <p class="text-white font-bold text-lg mt-1">

                        {{ $latest->visible_issue }}

                    </p>

                </div>

            </div>

        </div>

    </div>

@endif

        <!-- RECENT PROGRESS -->
        <div class="bg-white dark:bg-[#081526]
                    border border-gray-200 dark:border-gray-800
                    rounded-3xl p-8 shadow-xl">

            <div class="flex items-center justify-between mb-8">

                <h2 class="text-3xl font-bold
                           text-gray-800 dark:text-white">

                    Recent Crop Progress

                </h2>

            </div>

            <div class="space-y-6">

                @foreach($progresses as $progress)

                    <div class="flex items-center justify-between
                                bg-gray-50 dark:bg-[#0d1b2e]
                                rounded-2xl p-6">

                        <div>

                            <h3 class="text-xl font-bold
                                       text-gray-800 dark:text-white">

                                {{ $progress->field->field_name }}

                            </h3>

                            <p class="text-gray-500 dark:text-gray-400">

                                {{ $progress->growth_stage }}

                            </p>

                        </div>

                        <div class="text-right">

                            <p class="text-green-500 font-bold text-xl">

                                {{ $progress->health_percentage }}%

                            </p>

                            <p class="text-gray-500 dark:text-gray-400">

                                Health

                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    <!-- CHART -->
    <script type="module">

        import Chart from 'chart.js/auto';

        const ctx = document.getElementById('healthChart');

        new Chart(ctx, {

            type: 'line',

            data: {

                labels: [

                    @foreach($progresses as $progress)

                        '{{ $progress->field->field_name }}',

                    @endforeach

                ],

                datasets: [{

                    label: 'Crop Health %',

                    data: [

                        @foreach($progresses as $progress)

                            {{ $progress->health_percentage }},

                        @endforeach

                    ],

                    borderWidth: 3,
                    tension: 0.4

                }]

            },

            options: {

                responsive: true,

            }

        });

    </script>
<script>

window.addEventListener('load', () => {

    if (!sessionStorage.getItem('geo_loaded')) {

        navigator.geolocation.getCurrentPosition(

            async (position) => {

                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                await fetch(

                    `/weather-update?lat=${lat}&lon=${lon}`

                );

                sessionStorage.setItem(
                    'geo_loaded',
                    'true'
                );

                location.reload();

            }

        );

    }

});

</script>
</x-app-layout>