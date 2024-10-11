<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SuggestionsDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\SuggestionsCreateRequest;
use App\Http\Requests\SuggestionsUpdateRequest;
use App\Models\Suggestions;
use App\Http\Controllers\AppBaseController;

class SuggestionsController extends AppBaseController
{

    private $icon = 'pe-7s-notebook';


    public function index(SuggestionsDataTable $suggestionsDataTable)
    {
        $this->authorize('Suggestions-view');
        $icon = $this->icon;
        return $suggestionsDataTable->render('admin.suggestions.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('Suggestions-create');
        return view('admin.suggestions.create')->with('icon', $this->icon);
    }


    public function store(SuggestionsCreateRequest $request)
    {
        $this->authorize('Suggestions-create');
        // return $request;
        // Suggestions::create($request->all());

         $imageName = FileHelper::uploadImage($request);
        //  return array_merge($request->all(), ['image' => $imageName]);
        Suggestions::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.suggestions.index'));
    }


    public function show(Suggestions $suggestions)
    {
        $this->authorize('Suggestions-view');
        return view('admin.suggestions.show',compact('suggestions'))->with('icon', $this->icon);
    }


    public function edit(Suggestions $suggestions)
    {
        $this->authorize('Suggestions-update');
        return view('admin.suggestions.edit',compact('suggestions'))->with('icon', $this->icon);
    }


    public function update(Suggestions $suggestions, SuggestionsUpdateRequest $request)
    {
        $this->authorize('Suggestions-update');
        // $imageName = FileHelper::uploadImage($request, $suggestions);
        // $suggestions->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $suggestions->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.suggestions.index'));
    }


    public function destroy(Suggestions $suggestions)
    {
        $this->authorize('Suggestions-delete');
        //FileHelper::deleteImage($suggestions);
        $suggestions->delete();
    }
}
