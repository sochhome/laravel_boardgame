<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boardgame;
use DeepCopy\f001\B;
use Illuminate\Http\Request;

class BoardgameController extends Controller
{
    public function index() {
        # $boardgames = Boardgame::all();
        # $boardgames = Boardgame::orderby('price')->get(); # 'created_at', 'desc'
        $boardgames = Boardgame::orderby('created_at', 'desc')->paginate(8); # 
        #$boardgames = Boardgame::with('learningClasses')->orderby('created_at', 'desc')->paginate(8); # 

        return view('boardgames.index',   [ 'boardgames' => $boardgames,  'shopStatus' => 'Currently Open']);
    }

    public function show($id) {
        #$boardgame = Boardgame::findOrFail($id);    
        $boardgame = Boardgame::with('learningClasses')->findOrFail($id);    

        return view('boardgames.show', ['boardgame' => $boardgame]);
    }   

    public  function create() {
        $learningClasses = \App\Models\LearningClass::all(); // Fetch all learning classes
        return view('boardgames.create', ['learningClasses' => $learningClasses]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|max:9999.99',
            'availabilityYN' => 'required',
            'author' => 'required',
            'url' => 'required|url',
            'status' => 'required'
        ]);

        // Store the validated data in the database
        Boardgame::create($validated);

        return redirect()->route('boardgames.index')->with('success', 'Boardgame created successfully!');
    }

    public function destroy($id) {
        $boardgame = Boardgame::findOrFail($id);
        $boardgame->delete();

        return redirect()->route('boardgames.index')->with('success', 'Boardgame deleted successfully!');
    }
}
