<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TouristAttraction;
use Illuminate\Http\Request;

class TouristAttractionCotroller extends Controller
{
    public function index()
    {
        return view('tourist_attraction.index', [
            'title' => 'Tourist Attraction',
            'tourists' => TouristAttraction::latest()->get()
        ]);
    }

    public function create()
    {
        return view('tourist_attraction.create', [
            'title' => 'Add Tourist Attraction'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data = $request->all();

        $data['photo'] = $this->_upload($request);

        TouristAttraction::create($data);

        return redirect()->to('tourist-attractions');
    }

    public function edit(TouristAttraction $tourist_attraction)
    {
        return view('tourist_attraction.edit', [
            'title' => 'Edit Tourist Attraction',
            'tourist' => $tourist_attraction
        ]);
    }

    public function update(Request $request, TouristAttraction $tourist_attraction)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {

            unlink(public_path($tourist_attraction->photo));

            $tourist_attraction->update([
                'name' => $request->name,
                'location' => $request->location,
                'photo' => $this->_upload($request)
            ]);
        } else {
            $tourist_attraction->update([
                'name' => $request->name,
                'location' => $request->location
            ]);
        }

        return redirect()->to('tourist-attractions');
    }

    public function destroy(TouristAttraction $tourist_attraction)
    {
        unlink(public_path($tourist_attraction->photo));

        $tourist_attraction->delete();

        return redirect()->to('tourist-attractions');
    }

    protected function _upload($request)
    {
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);
        return 'images/' . $imageName;
    }
}
