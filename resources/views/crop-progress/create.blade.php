<x-app-layout>

    <div class="p-8">

        <div class="max-w-4xl mx-auto">

            <h1 class="text-5xl font-bold
                       text-gray-800 dark:text-white mb-10">

                Add Crop Progress

            </h1>

            <div class="bg-white dark:bg-[#081526]
                        border border-gray-200 dark:border-gray-800
                        rounded-3xl shadow-2xl p-10">

                <form action="{{ route('crop-progress.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-8">

                    @csrf

                    <!-- Field -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Select Field

                        </label>

                        <select name="field_id"

                                class="w-full rounded-2xl
                                       border border-gray-300
                                       dark:border-gray-700
                                       bg-gray-50 dark:bg-[#0d1b2e]
                                       text-gray-800 dark:text-white
                                       px-6 py-5 text-lg">

                            @foreach($fields as $field)

                                <option value="{{ $field->id }}">

                                    {{ $field->field_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Growth Stage -->
                    <!-- <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Growth Stage

                        </label>

                        <select name="growth_stage"

                                class="w-full rounded-2xl
                                       border border-gray-300
                                       dark:border-gray-700
                                       bg-gray-50 dark:bg-[#0d1b2e]
                                       text-gray-800 dark:text-white
                                       px-6 py-5 text-lg">

                            <option value="Germination">
                                Germination
                            </option>

                            <option value="Vegetative">
                                Vegetative
                            </option>

                            <option value="Flowering">
                                Flowering
                            </option>

                            <option value="Fruiting">
                                Fruiting
                            </option>

                            <option value="Harvest">
                                Harvest
                            </option>

                        </select>

                    </div> -->

                    <!-- Health -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Health Percentage

                        </label>

                        <input type="number"
                               name="health_percentage"
                               min="0"
                               max="100"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Progress -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Progress Percentage

                        </label>

                        <input type="number"
                               name="progress_percentage"
                               min="0"
                               max="100"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Yield -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Predicted Yield (kg)

                        </label>

                        <input type="number"
                               step="0.01"
                               name="predicted_yield"

                               class="w-full rounded-2xl
                                      border border-gray-300
                                      dark:border-gray-700
                                      bg-gray-50 dark:bg-[#0d1b2e]
                                      text-gray-800 dark:text-white
                                      px-6 py-5 text-lg">

                    </div>

                    <!-- Notes -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-gray-700 dark:text-gray-300">

                            Notes

                        </label>

                        <textarea name="notes"
                                  rows="4"

                                  class="w-full rounded-2xl
                                         border border-gray-300
                                         dark:border-gray-700
                                         bg-gray-50 dark:bg-[#0d1b2e]
                                         text-gray-800 dark:text-white
                                         px-6 py-5 text-lg"></textarea>

                    </div>
<!-- Crop Image -->
<div>

    <label class="block mb-3
                  text-lg font-semibold
                  text-gray-700 dark:text-gray-300">

        Crop Image

    </label>

    <input
        type="file"
        name="crop_image"
        accept="image/*"

        class="w-full rounded-2xl
               border border-gray-300
               dark:border-gray-700
               bg-gray-50 dark:bg-[#0d1b2e]
               text-gray-800 dark:text-white
               px-6 py-5 text-lg"
    >

</div>
                    <!-- Submit -->
                    <button type="submit"

                            class="bg-green-600 hover:bg-green-700
                                   text-white font-bold text-lg
                                   px-10 py-5 rounded-2xl
                                   transition hover:scale-105">

                        🌱 Save Progress

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>