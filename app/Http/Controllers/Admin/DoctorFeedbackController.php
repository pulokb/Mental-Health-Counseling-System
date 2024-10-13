<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DoctorFeedbackDataTable;
use App\Http\Requests;
use App\Http\Requests\DoctorFeedbackCreateRequest;
use App\Http\Requests\DoctorFeedbackUpdateRequest;
use App\Models\DoctorFeedback;
use App\Http\Controllers\AppBaseController;

class DoctorFeedbackController extends AppBaseController
{

    private $icon = 'pe-7s-note2';

    public function index(DoctorFeedbackDataTable $doctorFeedbackDataTable)
    {
        $icon = $this->icon;
        return $doctorFeedbackDataTable->render('admin.doctor_feedbacks.index', compact('icon'));
    }

    public function create()
    {
        return view('admin.doctor_feedbacks.create')->with('icon', $this->icon);
    }

// public function store(DoctorFeedbackCreateRequest $request)
//     {
//         $this->authorize('Symptoms-create');

//         // Get the authenticated user
//          $user = auth()->user();

//         DoctorFeedback::create(array_merge(
//                    $request->all(),
//                   ['user_id' => $user->id] // Add user_id to the data being saved
//                   ));
//         notify()->success(__("Successfully Created"), __("Feedback created successfully Created Doctor Will Send You a Response."));
//         return redirect(route('admin.doctorFeedbacks.index'));
//     }

public function store(DoctorFeedbackCreateRequest $request) {
    // Get the authenticated user
    $user = auth()->user();

    // try {
        // Store the feedback with the user_id
        DoctorFeedback::create(array_merge($request->all(), ['user_id' => $user->id]));

        return redirect()->route('response.get');

        // Notify the user of success
    //     notify()->success(__("Successfully Created"), __("Feedback created successfully. The doctor will respond soon."));

    //     // Check the role of the authenticated user to decide where to redirect
    //     if ($user->hasRole('admin')) {
    //         // Redirect the admin to the admin doctor feedback index page
    //         return redirect()->route('admin.doctorFeedbacks.index');
    //     } else {
    //         // Redirect normal user to the response page
    //         return redirect()->route('response.get');
    //     }
    // } catch (\Exception $e) {
    //     // Handle error, show error message or log it
    //     return back()->withErrors(['error' => $e->getMessage()]);
    // }

}



    public function show(DoctorFeedback $doctorFeedback)
    {
        return view('admin.doctor_feedbacks.show', compact('doctorFeedback'))->with('icon', $this->icon);
    }

    public function edit(DoctorFeedback $doctorFeedback)
    {
        return view('admin.doctor_feedbacks.edit', compact('doctorFeedback'))->with('icon', $this->icon);
    }

    public function update(DoctorFeedback $doctorFeedback, DoctorFeedbackUpdateRequest $request)
    {
        // $imageName = FileHelper::uploadImage($request, $doctorFeedback);
        // $doctorFeedback->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $doctorFeedback->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.doctorFeedbacks.index'));
    }

    public function destroy(DoctorFeedback $doctorFeedback)
    {
        // FileHelper::deleteImage($doctorFeedback);
        $doctorFeedback->delete();
    }
}
