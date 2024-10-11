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
    public function autoreport(Request $request) {
        $user = auth()->user();

        // Define the fields we will be processing
        $fields = [
            'student_q1', 'student_q2', 'student_q3', 'student_q4', 'student_q5',
            'family_q1', 'family_q2', 'family_q3', 'family_q4', 'family_q5',
            'relationship_q1', 'relationship_q2', 'relationship_q3', 'relationship_q4', 'relationship_q5',
            'job_q1', 'job_q2', 'job_q3', 'job_q4', 'job_q5',
            'mental_health_q1', 'mental_health_q2', 'mental_health_q3', 'mental_health_q4', 'mental_health_q5',
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
        $educationScore = 0;
        $familyScore = 0;
        $relationshipScore = 0;
        $jobScore = 0;
        $mentalHealthScore = 0;

        // Assuming each category has specific questions (adjust as needed)
        foreach ($fields as $field) {
            if (strpos($field, 'student') !== false && $request->$field == 'yes') {
                $educationScore += 20; // Assuming each 'yes' answer contributes 20 points
            }
            if (strpos($field, 'family') !== false && $request->$field == 'yes') {
                $familyScore += 20;
            }
            if (strpos($field, 'relationship') !== false && $request->$field == 'yes') {
                $relationshipScore += 20;
            }
            if (strpos($field, 'job') !== false && $request->$field == 'yes') {
                $jobScore += 20;
            }
            if (strpos($field, 'mental_health') !== false && $request->$field == 'yes') {
                $mentalHealthScore += 20;
            }
        }

        // Calculate total score (adjust based on your needs)
        $totalScore = ($educationScore + $familyScore + $relationshipScore + $jobScore + $mentalHealthScore) / 5;

        // Determine the result message based on total score
        $status = '';
        if ($totalScore <= 40) {
            $status = 'Good';
        } elseif ($totalScore > 40 && $totalScore <= 60) {
            $status = 'Moderate';
        } elseif ($totalScore > 60) {
            $status = 'Weak';
        }

        return view("frontend.autoreport", compact("userqueries", "user", "educationScore", "familyScore", "relationshipScore", "jobScore", "mentalHealthScore", "totalScore", "status"));
    }



    public function queryform() {
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


    public function symptoms(Request $request) {
        $symptoms = Symptoms::all(); // Consider pagination if the list grows
        return view('frontend.symptoms', compact('symptoms'));
    }

    public function symptomsDetails($id) {
        $symptom = Symptoms::findOrFail($id);
        $latestSymptoms = Symptoms::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.symptom-details', compact('symptom', 'latestSymptoms'));
    }

    public function suggestions(Request $request) {
        $suggestions = Suggestions::all(); // Consider pagination if necessary
        return view('frontend.suggestions', compact('suggestions'));
    }

    public function suggestionDetails($id) {
        $suggestion = Suggestions::findOrFail($id);
        $latestSuggestions = Suggestions::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.suggestion-details', compact('suggestion', 'latestSuggestions'));
    }

    public function faq() {
        return view("frontend.faq");
    }

    public function show(Symptoms $symptom) {
        return view('user.blog_show', compact('symptom'));
    }
}
