<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $blog = Blog::all();
         
        if (request()->ajax()) {
            return DataTables::of($blog)
                ->addIndexColumn()
                ->addColumn('image', function (Blog $blog) {
                    return "<img height='100px' width = '100px' alt='No image found.'  src='" . asset('images/' . $blog->image) . "' />";
                })
                ->addColumn('details', function (Blog $blog) {
                    return Str::limit($blog->details, 100);
                })
                ->addColumn('action', function (Blog $blog) {
                    return
                        "<a class='border-0 btn-sm btn-transition btn btn-outline-primary' href='" . route('admin.blogs.show', $blog->id) . "'>View</a> <br> " .
                        "<a class='border-0 btn-sm btn-transition btn btn-outline-info' href='" . route('admin.blogs.edit', $blog->id) . "'>Edit</a>  <br> " .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $blog->id . '" data-original-title="Delete" class="border-0 btn-sm btn-transition btn btn-outline-danger delete">Delete</a>';
                })
                ->rawColumns(['action', 'image','details'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCreateRequest $request)
    {
        // $imageName = FileHelper::uploadImage($request, NULL, array(), 50, 50);
        // $imageName = FileHelper::uploadImage($request, NULL, ['avatar', 'avatarHeight' => 50, 'avatarWidth' => 50]);
        // $imageName = FileHelper::uploadImage($request, NULL, ['avatar', 'avatarHeight' => 50, 'avatarWidth' => 50, 'big', 'bigHeight' => 600, 'bigWidth' => 1000], 300, 300);
        $imageName = FileHelper::uploadImage($request, NULL, ['avatar', 'big']);
        Blog::create(array_merge($request->all(), ['image' => $imageName]));
        return back()->with('success', 'Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $imageName = FileHelper::uploadImage($request, $blog, ['avatar', 'big']);
        $blog->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        return back()->with('success', 'Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        FileHelper::deleteImage($blog);
        $blog->delete();
        // return back()->with('success', 'Delete Successful.');
    }
}
