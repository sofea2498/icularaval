<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index() {

        //return "This is the Feed List"
        $feeds = Feed::paginate(5);
        return view('pages.feed.index', compact('feeds'));
    }


    public function create() {

        //return "This is the Feed List"

        return view('pages.feed.create');

    }

    public function store(Request $request ) {

        $validated_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        //ORM
        //add a user id to the $validated_request
        $validated_request['user_id'] = 1;
        Feed::create($validated_request);
        return redirect()->route('feeds')->with('success', 'Feed created successfully');
        
        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feeds')->with('success', 'Feed created successfully');

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
