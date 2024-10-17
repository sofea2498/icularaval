<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Parsedown;

class AiController extends Controller
{
    public function generateAiPage(Request $request) {

        $queryTitle = $request->input('title');

        Log::debug("queryTitle: ", ['$queryTitle' => $queryTitle]);

        if(empty($queryTitle)){
            return view('pages.Ai.ai');
        }

        // Define the API URL and the payload
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key='.env('GEMINI_API_KEY');
        
        $payload = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $queryTitle]
                    ]
                ]
            ]
        ];

        // Send the POST request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        // Handle the response and pass it to the view
        if ($response->successful()) {
            $data = $response->json();

            Log::debug("Generate Feed Content", [ 'candidates' => $data['candidates'] ]);

            // dd($data->candidates->content);

            // Initialize Parsedown
            $parsedown = new Parsedown();

            // Convert Markdown to HTML
            if (isset($data['candidates'])) {
                foreach ($data['candidates'] as &$item) {
                    if (isset($item['content']['parts'])) {
                        foreach ($item['content']['parts'] as &$part) {
                            $part['text'] = $parsedown->text($part['text']); // Convert to HTML
                        }
                    }
                }
            }

            return view('pages.Ai.ai', ['data' => $data]);
        } else {
            $error = $response->body();
            return view('pages.Ai.ai', ['error' => $error]);
        }
    }

    }

