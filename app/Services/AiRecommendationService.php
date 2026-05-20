<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiRecommendationService
{
    public function generate($fieldData)
    {
        $apiKey = env('GEMINI_API_KEY');

        $prompt = "

        You are an agricultural AI expert.

        Analyze the following farm data and provide
        smart farming recommendations.

        Crop: {$fieldData['crop']}
        Health: {$fieldData['health']}%
        Temperature: {$fieldData['temperature']}°C
        Humidity: {$fieldData['humidity']}%
        Growth Stage: {$fieldData['stage']}
        Predicted Yield: {$fieldData['yield']}kg

        Give:
        - risks
        - recommendations
        - irrigation advice
        - yield improvement suggestions

        Keep response concise and professional.

        ";

        $response = Http::post(

            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}",

            [

                "contents" => [

                    [

                        "parts" => [

                            [
                                "text" => $prompt
                            ]

                        ]

                    ]

                ]

            ]

        );

        return $response['candidates'][0]['content']['parts'][0]['text']
            ?? 'No AI recommendations available.';
    }
}