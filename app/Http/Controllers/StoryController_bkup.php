<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    //

    public function index()
    {
        //
        $stories = Story::where('user_id', auth()->user()->id)
                        ->orderBy('id', 'DESC')
                        ->paginate(1);
        
        return view('stories.index', [
            'stories' => $stories
        ]);

    }

    public function show($story)
    {

        $story = Story::findOrFail($story);
        // dd($story);

        // dd($story);
    }


}
