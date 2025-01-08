<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SymptomsDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\SymptomsCreateRequest;
use App\Http\Requests\SymptomsUpdateRequest;
use App\Models\Symptoms;
use App\Http\Controllers\AppBaseController;

class SymptomsController extends AppBaseController
{

    private $icon = 'pe-7s-photo-gallery';


    public function index(SymptomsDataTable $symptomsDataTable)
    {
        $this->authorize('Symptoms-view');
        $icon = $this->icon;
        return $symptomsDataTable->render('admin.symptoms.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('Symptoms-create');
        return view('admin.symptoms.create')->with('icon', $this->icon);
    }


    public function store(SymptomsCreateRequest $request)
    {
        $this->authorize('Symptoms-create');
        // Symptoms::create($request->all());
        $imageName = FileHelper::uploadImage($request);
        Symptoms::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.symptoms.index'));
    }


    // public function show(Symptoms $symptoms)
    // {
    //     $this->authorize('Symptoms-view');
    //     return view('admin.symptoms.show', compact('symptoms'))->with('icon', $this->icon);
    // }

    public function show($id)
{
    $this->authorize('Symptoms-view');

    // Manually fetch the record
    $symptoms = Symptoms::find($id);

    if (!$symptoms) {
        abort(404, 'Symptoms not found.');
    }

    return view('admin.symptoms.show', compact('symptoms'))->with('icon', $this->icon);
}




    // public function edit(Symptoms $symptoms)
    // {
    //     $this->authorize('Symptoms-update');
    //     return view('admin.symptoms.edit',compact('symptoms'))->with('icon', $this->icon);
    // }


    public function edit($id)
    {
        $symptom = Symptoms::findOrFail($id);
        return view('admin.symptoms.edit', compact('symptom'));
    }


    public function update(Symptoms $symptoms, SymptomsUpdateRequest $request)
{
    $this->authorize('Symptoms-update');

    // Handle image upload if present
    if ($request->hasFile('image')) {
        $imageName = FileHelper::uploadImage($request, $symptoms);
        $symptoms->image = $imageName;
    }

    // Update other fields
    $symptoms->fill($request->except(['image']))->save();

    notify()->success(__("Successfully Updated"), __("Success"));
    return redirect(route('admin.symptoms.index'));
}



    // public function destroy(Symptoms $symptoms)
    // {
    //     $this->authorize('Symptoms-delete');
    //     //FileHelper::deleteImage($symptoms);
    //     $symptoms->delete();
    // }


    public function destroy($id)
    {
        $symptom = Symptoms::findOrFail($id);
        $symptom->delete();
        return redirect()->route('admin.symptoms.index')->with('success', 'Symptom deleted successfully.');
    }

}
