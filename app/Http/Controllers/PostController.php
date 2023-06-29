<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request, Response};
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = DB::select('select * from posts');
        return view('crud', [
            'posts' => Post::query()
                        ->get(),]);
    }
    
    public function store()
    {
        // request()->validate([
        //             'posts' => [
        //                 'required',
        //                 'min:10',
        //                 function ($attribute, $value, Closure $fail) {
            //                     if($value[strlen($value) - 1] != '?') {
                //                         $fail('Are you sure that is a question? It is missing a question mark in the end.');
                //                     }
                //                 },
                //             ],
                //         ]);
                Post::query()->create([
                    'name'=>request()->name
                ]);
                return $this->index();
            }
            /**
             * Update the specified resource in storage.
             */
            public function update(Post $post)
            {
                $post->update([
                    'name'=>request()->name
                ]);
                return $this->index();
            }
        
            /**
             * Remove the specified resource from storage.
             */
            public function destroy(Post $post)
            {
                $post->delete();

                return $this->index();
            }
            /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Post $posts): View
    // {
    //     $this->authorize('update', $posts);
        
    //     return view('posts.edit', compact('posts'));
    // }
    // public function edit(Question $question): View
    // {
    //     $this->authorize('update', $question);

    //     return view('question.edit', compact('question'));
    // }

}
