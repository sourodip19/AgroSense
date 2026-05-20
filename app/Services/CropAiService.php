<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CropAiService
{
    public function analyze($imagePath, $crop, $issue)
    {
        $apiKey = env('GEMINI_API_KEY');

        $imageData = base64_encode(
            file_get_contents(storage_path('app/public/' . $imagePath))
        );

        $prompt = "

You are an agricultural AI expert.

Analyze this crop image.

Crop Type: {$crop}

Visible Issue: {$issue}

Return ONLY:

1. Health Score (0-100)
2. Disease Name
3. Risk Level
4. Recommendation

Format:

Health Score: XX
Disease: XXX
Risk Level: XXX
Recommendation: XXX

";

        $response = Http::post(

            "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}",

            [

                'contents' => [

                    [
                        'parts' => [

                            [
                                'text' => $prompt
                            ],

                            [
                                'inline_data' => [

                                    'mime_type' => 'image/jpeg',

                                    'data' => $imageData

                                ]
                            ]

                        ]
                    ]

                ]

            ]

        );

        return $response->json();
    }
}