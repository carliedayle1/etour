<?php

namespace App\Http\Controllers;

use App\Models\TouristSpot;
use Illuminate\Http\Request;

class TouristSpotController extends Controller
{
    public function manage()
    {
        return view('tourist_spots.manage', [
            'touristSpots' => TouristSpot::latest()->filter(request(['search']))->paginate(6)
        ]);
    }

    public function create()
    {
        return view('tourist_spots.create');
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
        'name' => 'required|min:3',
        'description' => 'required|min:6',
        'fee' => 'required|min_digits:0|decimal:0,2',
        'address' => 'required|min:6',
        'image' => 'nullable|mimes:jpg,jpeg,png,gif',
        'featured' => 'nullable'
       ]);

       if(array_key_exists("featured",$validated)){
        $validated['featured'] = true;
       }

       if($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('tourist-spots', 'public');
        }

        TouristSpot::create($validated);

        return redirect('/')->with('created', 'Tourist Spot created');
    }


    public function show(TouristSpot $touristSpot)
    {
        return view('tourist_spots.show', ['touristSpot' => $touristSpot]);
    }

    public function destroy(TouristSpot $touristSpot)
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }

        $touristSpot->delete();

        return back()->with('deleted', 'deleted');
    }

    public function edit(TouristSpot $touristSpot)
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }

        return view('tourist_spots.edit', [
            'touristSpot' => $touristSpot
        ]);
    }

    public function update(TouristSpot $touristSpot)
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }

        $validated = request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:6',
            'fee' => 'required|min_digits:0|decimal:0,2',
            'address' => 'required|min:6',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif',
            'featured' => 'nullable'
           ]);

           
           if(array_key_exists("featured",$validated)){
            $validated['featured'] = true;
           } else {
            $validated['featured'] = false;
           }

           if(request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('tourist-spots', 'public');
            }
            
            $touristSpot->update($validated);

            return back()->with('updated', 'updated');
    }

    public function index()
    {
        return view('tourist_spots.index', [
            'touristSpots' => TouristSpot::latest()->filter(request(['search']))->paginate(6)
        ]);
    }
}
