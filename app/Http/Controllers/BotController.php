<?php

namespace App\Http\Controllers;

use App\Models\BotResponse;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function handle(Request $request)
    {
        $question = $request->input('question');

        // Simple keyword-based matching for demonstration
        $response = BotResponse::where('question', 'LIKE', "%{$question}%")->first();

        if ($response) {
            return response()->json(['response' => $response->response]);
        }

        return response()->json(['response' => "Sorry, I don't understand the question. Can you please rephrase?"]);
    }
}
