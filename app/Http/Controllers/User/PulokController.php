<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserQuery;
use App\Models\Symptoms;
use App\Models\Suggestions;
use App\Models\DoctorFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PulokController extends Controller
{
    public function autoreport(Request $request)
    {
        $user = auth()->user();

        // Define the fields we will be processing
        $fields = [
            'depression_q1',
            'depression_q2',
            'depression_q3',
            'anxiety_q1',
            'anxiety_q2',
            'anxiety_q3',
            'irritability_q1',
            'irritability_q2',
            'irritability_q3',
            'emotional_q1',
            'emotional_q2',
            'emotional_q3',
            'social_q1',
            'social_q2',
            'social_q3',
            'fatigue_q1',
            'fatigue_q2',
            'fatigue_q3',
            'concentrating_q1',
            'concentrating_q2',
            'concentrating_q3',
            'sleep_q1',
            'sleep_q2',
            'sleep_q3',
            'esteem_q1',
            'esteem_q2',
            'esteem_q3',
            'panic_q1',
            'panic_q2',
            'panic_q3',
        ];

        // Validate the incoming request data
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field] = 'required|max:191|string';
        }
        $request->validate($rules);

        // Prepare the data to be stored in the UserQuery
        $data = ['user_id' => $user->id];
        foreach ($fields as $field) {
            $data[$field] = $request->$field;
        }

        // Create a new UserQuery entry
        UserQuery::create($data);

        // Fetch the latest user queries for displaying in the view
        $userqueries = UserQuery::where('user_id', $user->id)->latest()->first();

        // Calculate scores based on responses
        $depressionScore = 0;
        $anxietyScore = 0;
        $irritabilityScore = 0;
        $emotionalScore = 0;
        $socialScore = 0;
        $fatigueScore = 0;
        $concentratingScore = 0;
        $sleepScore = 0;
        $esteemScore = 0;
        $panicScore = 0;

        // Assuming each category has specific questions (adjust as needed)
        foreach ($fields as $field) {
            if (strpos($field, 'depression') !== false && $request->$field == 'yes') {
                $depressionScore += 25; // Assuming each 'yes' answer contributes 25 points
            }
            if (strpos($field, 'anxiety') !== false && $request->$field == 'yes') {
                $anxietyScore += 25;
            }
            if (strpos($field, 'irritability') !== false && $request->$field == 'yes') {
                $irritabilityScore += 25;
            }
            if (strpos($field, 'emotional') !== false && $request->$field == 'yes') {
                $emotionalScore += 25;
            }
            if (strpos($field, 'social') !== false && $request->$field == 'yes') {
                $socialScore += 25;
            }
            if (strpos($field, 'fatigue') !== false && $request->$field == 'yes') {
                $fatigueScore += 25;
            }
            if (strpos($field, 'concentrating') !== false && $request->$field == 'yes') {
                $concentratingScore += 25;
            }
            if (strpos($field, 'sleep') !== false && $request->$field == 'yes') {
                $sleepScore += 25;
            }
            if (strpos($field, 'esteem') !== false && $request->$field == 'yes') {
                $esteemScore += 25;
            }
            if (strpos($field, 'panic') !== false && $request->$field == 'yes') {
                $panicScore += 25;
            }
        }

        // Calculate total score (adjust based on your needs)
        $totalScore = ($depressionScore + $anxietyScore + $irritabilityScore + $emotionalScore + $socialScore + $fatigueScore + $concentratingScore + $sleepScore + $esteemScore + $panicScore);

        // Determine the totalScore message based on total score
        $status = '';
        if ($totalScore <= 325) {
            $status = 'Good';
        } elseif ($totalScore > 325 && $totalScore <= 450) {
            $status = 'Moderate';
        } elseif ($totalScore > 450) {
            $status = 'Weak';
        }

        return view("frontend.autoreport", compact("userqueries", "user", "depressionScore", "anxietyScore", "irritabilityScore", "emotionalScore", "socialScore", "fatigueScore", "concentratingScore", "sleepScore", "esteemScore", "panicScore", "totalScore", "status"));
    }





    public function queryform()
    {
        return view("frontend.queryform");
    }


    public function response()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Fetch feedbacks that belong to the logged-in user
        $feedbacks = DoctorFeedback::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        // Return the view with the filtered feedback data
        return view('frontend.response', compact('feedbacks'));
    }


    public function symptoms(Request $request)
    {
        $symptoms = Symptoms::all(); // Consider pagination if the list grows
        return view('frontend.symptoms', compact('symptoms'));
    }

    public function symptomsDetails($id)
    {
        $symptom = Symptoms::findOrFail($id);
        $latestSymptoms = Symptoms::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.symptom-details', compact('symptom', 'latestSymptoms'));
    }

    public function suggestions(Request $request)
    {
        $suggestions = Suggestions::all(); // Consider pagination if necessary
        return view('frontend.suggestions', compact('suggestions'));
    }

    public function suggestionDetails($id)
    {
        $suggestion = Suggestions::findOrFail($id);
        $latestSuggestions = Suggestions::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.suggestion-details', compact('suggestion', 'latestSuggestions'));
    }

    public function faq()
    {
        return view("frontend.faq");
    }

    public function show(Symptoms $symptom)
    {
        return view('user.blog_show', compact('symptom'));
    }
}
