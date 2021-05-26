<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stories = Story::where('user_id', auth()->user()->id)
        ->get();

        return view('stories.index', [
        'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Let's put a gate here
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        //

        // $request->validate([
        //     'title'=> 'required',
        //     'body'=> 'required',
        //     'type'=> 'required',
        //     'status'=> 'required',
        // ]);   --> switched to the Requests

        // dd($request->all());

        // Story::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'type' => $request->type,
        //     'status' => $request->status,
        // ]);

        // Remember it does not have a user_id which does not have any default value


        // Get the current authenticated user and then call it 
        auth()->user()->stories()->create($request->all());
    
        return redirect()->route('stories.index')->with('status', 'Stories Created Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
        dd($story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        $this->authorize('update', $story);
        // Gate::authorize('editable-story', $story);

        return view('stories.edit', [
            'story' => $story
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {

        $this->authorize('update', $story);
        $story->update($request->all());

        return redirect()->route('stories.index')->with('status', 'Story Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $this->authorize('delete', $story);

        $story->delete();

        return redirect()->route('stories.index')->with('status', 'Story Successfully Deleted');


    }
}
