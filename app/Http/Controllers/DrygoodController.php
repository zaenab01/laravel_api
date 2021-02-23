<?php

namespace App\Http\Controllers;
use App\Models\Drygood;
use Illuminate\Http\Request;

class DrygoodController extends Controller
{
    public function index()
    {
        $drygoods = Drygood::latest()->paginate(5);

        return view('drygoods.index', compact('drygoods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('drygoods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);

        Drygood::create($request->all());

        return redirect()->route('drygoods.index')
            ->with('success', 'Dry Good created successfully.');
    }

    public function show(Drygood $drygood)
    {
        return view('drygoods.show', compact('drygood'));
    }

    public function edit(Drygood $drygood)
    {
        return view('drygoods.edit', compact('drygood'));
    }

    public function update(Request $request, Drygood $drygood)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);
        $drygood->update($request->all());

        return redirect()->route('drygoods.index')
            ->with('success', 'Dry Good updated successfully');
    }

    public function destroy(Drygood $drygood)
    {
        $drygood->delete();

        return redirect()->route('drygoods.index')
            ->with('success', 'Dry Good deleted successfully');
    }
}
