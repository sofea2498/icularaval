<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index() {

        //return "This is the Feed List"

        return view('pages.feed.index');
    }


    public function create() {

        //return "This is the Feed List"

        return view('pages.feed.create');

    }


    public function edit() {

        //return "This is the Feed List"

        return view('pages.feed.edit');
    }

    public function show(Feed $feed) {

        Log::debug("Show Feed", ['feed' => $feed]);
        //dd($feed);
        return view('pages.feed.show', compact('feed'));
    }

    public function update(Request $request, Feed $feed) {

        $validated_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        // return redirect()->route('feeds');

        $feed->update($validated_request);
        return redirect()->route('feeds');
        
        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feeds')->with('success', 'Feed updated successfully');
    }

    
}
