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
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-10">

            <!-- Chart -->
            <div class="xl:col-span-2
                        bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl p-8 shadow-xl">

                <h2 class="text-2xl font-bold
                           text-gray-800 dark:text-white mb-8">

                    Crop Health Analytics

                </h2>

                <canvas id="healthChart"></canvas>

            </div>

            <!-- Smart Insights -->
           <!-- Smart Alerts + AI -->
<div class="space-y-8">

    <!-- Smart Alerts -->
    <div class="bg-white dark:bg-[#081526]
                border border-gray-200 dark:border-gray-800
                rounded-3xl p-8 shadow-xl">

        <h2 class="text-2xl font-bold
                   text-gray-800 dark:text-white mb-6">

            Smart Alerts

        </h2>

        <div class="space-y-4">

            @forelse($alerts as $alert)

                <div class="rounded-2xl p-5

                    @if($alert['type'] == 'danger')
                        bg-red-50 dark:bg-red-900/20
                        border border-red-200 dark:border-red-800
                    @elseif($alert['type'] == 'warning')
                        bg-yellow-50 dark:bg-yellow-900/20
                        border border-yellow-200 dark:border-yellow-800
                    @else
                        bg-green-50 dark:bg-green-900/20
                        border border-green-200 dark:border-green-800
                    @endif
                ">

                    <p class="font-semibold

                        @if($alert['type'] == 'danger')
                            text-red-600 dark:text-red-400
                        @elseif($alert['type'] == 'warning')
                            text-yellow-600 dark:text-yellow-400
                        @else
                            text-green-600 dark:text-green-400
                        @endif
                    ">

                        {{ $alert['message'] }}

                    </p>

                </div>

            @empty

                <div class="bg-green-50 dark:bg-green-900/20
                            border border-green-200 dark:border-green-800
                            rounded-2xl p-5">

                    <p class="text-green-600 dark:text-green-400
                              font-semibold">

                        ✅ All agricultural conditions are stable.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

    <!-- AI Crop Advisor -->
    <div class="bg-white dark:bg-[#081526]
                border border-gray-200 dark:border-gray-800
                rounded-3xl p-8 shadow-xl">

        <h2 class="text-2xl font-bold
                   text-gray-800 dark:text-white mb-6">

            🤖 AI Crop Advisor

        </h2>

        <div class="bg-gray-50 dark:bg-[#0d1b2e]
                    rounded-2xl p-6">

            <p class="text-gray-700 dark:text-gray-300
                      leading-8 whitespace-pre-line">

                {{ $aiAdvice }}

            </p>

        </div>

    </div>

</div>

        </div>

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