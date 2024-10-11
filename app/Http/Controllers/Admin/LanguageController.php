<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LanguageDataTable;
use App\Http\Requests;
use App\Http\Requests\LanguageCreateRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Models\Language;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use File;
use Exception;

class LanguageController extends AppBaseController
{

    private $icon = 'pe-7s-comment';


    public function index(LanguageDataTable $languageDataTable)
    {
        $this->authorize('Language-view');
        $languages = Language::where('status', 1)->get();
        $icon = 'pe-7s-comment';
        return $languageDataTable->render('admin.languages.index', compact('icon', 'languages'));
    }


    public function create()
    {
        $this->authorize('Language-create');
        return view('admin.languages.create')->with('icon', $this->icon);
    }


    public function store(LanguageCreateRequest $request)
    {
        $this->authorize('Language-create');
        $status = $request->status ?? 0;
        if(file_exists(resource_path('lang/en.json'))){
            File::copy(resource_path('lang/en.json'), resource_path('lang/' . $request->code . '.json'));
        }
        Language::create(array_merge($request->all(), ['status' => $status]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.languages.index'));
    }


    public function show(Language $language)
    {
        $this->authorize('Language-view');
        return view('admin.languages.show', compact('language'))->with('icon', $this->icon);
    }


    public function edit(Language $language)
    {
        $this->authorize('Language-update');
        if ($language->id == 1) {
            abort(403);
        }
        return view('admin.languages.edit', compact('language'))->with('icon', $this->icon);
    }


    public function update(Language $language, LanguageUpdateRequest $request)
    {
        $this->authorize('Language-update');
        $status = $request->status ?? 0;

        if(file_exists(resource_path('lang/'.$language->code.'.json'))){
            rename(resource_path('lang/' . $language->code . '.json'), resource_path('lang/' . $request->code . '.json'));
        }

        $language->fill(array_merge($request->all(), ['status' => $status]))->save();

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.languages.index'));
    }


    public function destroy(Language $language)
    {
        $this->authorize('Language-delete');
        //FileHelper::deleteImage($language);
        if($language->name == "English" || $language->name == "Bangle"){
            return response()->json([],400);
        }
        File::delete(resource_path('lang/') . $language->code . '.json');
        $language->delete();
    }

    public function deleteBySelection(Request $request)
    {
        $this->authorize($request->permission);
        $dataId = $request->dataId;
        try {
            Language::whereNotIn('id', [1, 2])->whereIn('id', $dataId)->delete();
            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }

    public function setDefaultLanguage(Request $request)
    {
        $this->authorize('Language-set-default');
        overWriteEnvFile('LOCALE', $request->locale);
        notify()->success(__("Successful"), __("Success"));
        return redirect(route('admin.languages.index'));
    }

    public function translatePage(Language $language)
    {
        $this->authorize('Language-translate');

        $translates = json_decode(file_get_contents(resource_path('lang/') . $language->code . '.json'), true);

        return view('admin.languages.translate', compact('language', 'translates'))->with('icon', $this->icon);;
    }

    public function translate(Language $language, Request $request)
    {
        $this->authorize('Language-translate');

        $data = array();
        for ($i = 0; $i < sizeof($request['key']); $i++) {
            $data[$request->key[$i]] = $request->value[$i];
        }
        file_put_contents(resource_path('lang/') . $language->code . '.json', json_encode($data));
        notify()->success(__("Successful"), __("Success"));
        return back();
    }
}
