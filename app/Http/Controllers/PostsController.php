<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = Posts::all();
        return view('posts', compact('Posts'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Categories::all();
        return view('createPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'categorie_id'=> 'required',
            "title"=> 'required',
            'description'=> 'required',
            'slug'=> 'required',
            'featured_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]); 

        $filename = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_FILENAME);
        $image   = $filename.'_'.time().'.'.$request->featured_image->extension();

        $request->featured_image->storeAs('images', $image, 'public');
        
        $validatedData['featured_image'] = $image;
    
        $Post = Posts::create($validatedData);
    
        return redirect('/posts')->with('success', 'Article créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Posts::findOrFail($id);
        $categories = Categories::all();

        return view('editPost', compact('Post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

            'categorie_id'=> 'required',
            "title"=> 'required',
            'description'=> 'required',
            'slug'=> 'required',
            'featured_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]); 
        if($request->featured_image){
            $filename = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_FILENAME);
            $image   = $filename.'_'.time().'.'.$request->featured_image->extension();

            $request->featured_image->storeAs('images', $image, 'public');
            $validatedData['featured_image'] = $image;
        }
        

        Posts::whereId($id)->update($validatedData);

        return redirect('/posts')->with('success', 'Article mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Posts::findOrFail($id);
        $Post->delete();

        return redirect('/posts')->with('success', 'article supprimer avec succèss');
    }
}
