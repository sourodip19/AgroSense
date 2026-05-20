<x-app-layout>

    <div class="p-8">

        <!-- Header -->
        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-5xl font-bold
                           text-white">

                    {{ $field->field_name }}

                </h1>

                <p class="text-gray-400 mt-3 text-lg">

                    Crop Progress Intelligence Center

                </p>

            </div>

            <a href="{{ route('crop-progress.create', $field) }}"

               class="bg-green-600 hover:bg-green-700
                      text-white px-8 py-4
                      rounded-2xl font-bold
                      transition hover:scale-105">

                + Add Progress

            </a>

        </div>

        <!-- Timeline -->
        <div class="space-y-8">

            @forelse($progresses as $progress)

                <div class="bg-[#081526]
                            border border-gray-800
                            rounded-3xl p-8 shadow-xl">

                    <!-- Top -->
                    <div class="flex items-center
                                justify-between mb-6">

                        <div>

                            <h2 class="text-3xl font-bold
                                       text-white">

                                {{ $progress->growth_stage }}

                            </h2>

                            <p class="text-gray-400 mt-2">

                                {{ $progress->created_at
                                    ->format('d M Y • h:i A') }}

                            </p>

                        </div>

                        <div class="bg-green-900/30
                                    text-green-400
                                    px-5 py-3 rounded-2xl
                                    font-semibold">

                            {{ $progress->crop_age }} Days

                        </div>

                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-1
                                md:grid-cols-3 gap-6 mb-8">

                        <!-- Health -->
                        <div class="bg-[#0d1b2e]
                                    rounded-2xl p-6">

                            <p class="text-gray-400 mb-3">
                                Health
                            </p>

                            <h3 class="text-4xl font-bold
                                       text-green-500">

                                {{ $progress->health_percentage }}%

                            </h3>

                        </div>

                        <!-- Progress -->
                        <div class="bg-[#0d1b2e]
                                    rounded-2xl p-6">

                            <p class="text-gray-400 mb-3">
                                Growth
                            </p>

                            <h3 class="text-4xl font-bold
                                       text-blue-500">

                                {{ $progress->progress_percentage }}%

                            </h3>

                        </div>

                        <!-- Yield -->
                        <div class="bg-[#0d1b2e]
                                    rounded-2xl p-6">

                            <p class="text-gray-400 mb-3">
                                Predicted Yield
                            </p>

                            <h3 class="text-4xl font-bold
                                       text-yellow-500">

                                {{ $progress->predicted_yield }}kg

                            </h3>

                        </div>

                    </div>

                    <!-- Notes -->
                    @if($progress->notes)

                        <div class="bg-[#0d1b2e]
                                    rounded-2xl p-6">

                            <p class="text-gray-300 leading-relaxed">

                                {{ $progress->notes }}

                            </p>

                        </div>

                    @endif

                </div>

            @empty

                <div class="bg-yellow-900/20
                            border border-yellow-700
                            rounded-3xl p-10 text-center">

                    <p class="text-yellow-400
                              text-2xl font-semibold">

                        No crop progress added yet.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>