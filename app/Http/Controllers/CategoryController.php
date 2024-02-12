<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    function __construct(){
        $this->middleware('auth')->only('store', 'destroy', 'update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        if (Auth::id() == null)
//        {
//            return view('auth.login');
//        }

        $request->validate([
            "name"=>'required|unique:categories|min:3'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $category = Category::create($data);
        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' =>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
//        if (Auth::id() == null )
//        {
//            return view('auth.login');
//        }

        if (!Gate::allows('update-category', $category))
        {
            abort(403);
        }

        $request->validate([
            "name"=>['required',Rule::unique('categories')->ignore($category)]
        ]);

        $category->update($request->all());

        return to_route('categories.show',$category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
//        if (Auth::id() == null)
//        {
//            return view('auth.login');
//        }

        if (Gate::allows('delete-category', $category)) {
            $category->delete();
            return to_route('categories.index');
        }
        abort(403);

//        if (Auth::id()  === $category->user_id)
//        {
//            $category->delete();
//            return to_route('categories.index');
//        }
    }
}
