<x-app-layout>

    <div class="p-8">

        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="mb-10">

                <h1 class="text-5xl font-bold
                           text-white mb-4">

                    🌿 Crop Health Update

                </h1>

                <p class="text-gray-400 text-xl">

                    Upload crop condition and let AgroSense AI
                    analyze your field automatically.

                </p>

            </div>

            <!-- Main Card -->
            <div class="bg-[#081526]
                        border border-gray-800
                        rounded-3xl shadow-2xl
                        p-10">

                <form action="{{ route('crop-progress.store', $field) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-8">

                    @csrf

                    <!-- Selected Field -->
                    <div class="bg-green-900/20
                                border border-green-800
                                rounded-2xl p-6">

                        <h2 class="text-2xl font-bold
                                   text-green-400">

                            🌾 Field:
                            {{ $field->field_name }}

                        </h2>

                        <p class="text-gray-400 mt-2">

                            Crop:
                            {{ $field->crop_type }}

                        </p>

                    </div>

                    <!-- Crop Condition -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-white">

                            Crop Condition

                        </label>

                        <select name="crop_condition"

                                class="w-full rounded-2xl
                                       border border-gray-700
                                       bg-[#0d1b2e]
                                       text-white
                                       px-6 py-5 text-lg">

                            <option value="Excellent">
                                🌟 Excellent
                            </option>

                            <option value="Good">
                                ✅ Good
                            </option>

                            <option value="Average">
                                ⚠️ Average
                            </option>

                            <option value="Poor">
                                ❌ Poor
                            </option>

                            <option value="Critical">
                                🚨 Critical
                            </option>

                        </select>

                    </div>

                    <!-- Visible Issues -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-white">

                            Visible Issues

                        </label>

                        <select name="visible_issue"

                                class="w-full rounded-2xl
                                       border border-gray-700
                                       bg-[#0d1b2e]
                                       text-white
                                       px-6 py-5 text-lg">

                            <option value="No Issues">
                                ✅ No Issues
                            </option>

                            <option value="Yellow Leaves">
                                🍂 Yellow Leaves
                            </option>

                            <option value="Brown Spots">
                                🟤 Brown Spots
                            </option>

                            <option value="Dry Leaves">
                                🌵 Dry Leaves
                            </option>

                            <option value="Slow Growth">
                                🐌 Slow Growth
                            </option>

                            <option value="Pest Attack">
                                🐛 Pest Attack
                            </option>

                        </select>

                    </div>

                    <!-- Crop Image -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-white">

                            Upload Crop Image

                        </label>

                        <div class="border-2 border-dashed
                                    border-gray-700
                                    rounded-3xl
                                    p-10 text-center
                                    bg-[#0d1b2e]">

                            <input
                                type="file"
                                name="crop_image"
                                accept="image/*"

                                class="w-full
                                       text-white"
                            >

                            <p class="text-gray-500 mt-4">

                                Upload leaf or crop image for AI analysis

                            </p>

                        </div>

                    </div>

                    <!-- Notes -->
                    <div>

                        <label class="block mb-3
                                      text-lg font-semibold
                                      text-white">

                            Additional Notes

                        </label>

                        <textarea name="notes"
                                  rows="5"

                                  placeholder="Describe anything unusual about the crop..."

                                  class="w-full rounded-2xl
                                         border border-gray-700
                                         bg-[#0d1b2e]
                                         text-white
                                         px-6 py-5 text-lg"></textarea>

                    </div>

                    <!-- Submit -->
                    <button type="submit"

                            class="w-full
                                   bg-green-600
                                   hover:bg-green-700
                                   text-white
                                   font-bold
                                   text-xl
                                   py-5 rounded-2xl
                                   transition
                                   hover:scale-[1.02]
                                   shadow-lg shadow-green-900/30">

                        🤖 Analyze Crop with AgroSense AI

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>