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

public function store(DoctorFeedbackCreateRequest $request) {
    // Get the authenticated user
    $user = auth()->user();

        DoctorFeedback::create(array_merge($request->all(), ['user_id' => $user->id]));

        return redirect()->route('response.get');

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
        $doctorFeedback->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.doctorFeedbacks.index'));
    }

    public function destroy(DoctorFeedback $doctorFeedback)
    {
        $doctorFeedback->delete();
    }
}
