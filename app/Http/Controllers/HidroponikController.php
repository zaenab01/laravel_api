<?php

namespace App\Http\Controllers;
use App\Models\Hidroponik;
use Illuminate\Http\Request;

class HidroponikController extends Controller
{
    public function index()
    {
        $hidroponiks = Hidroponik::latest()->paginate(5);

        return view('hidroponiks.index', compact('hidroponiks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('hidroponiks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);

        Hidroponik::create($request->all());

        return redirect()->route('hidroponiks.index')
            ->with('success', 'Dry Good created successfully.');
    }

    public function show(Hidroponik $hidroponik)
    {
        return view('hidroponiks.show', compact('hidroponik'));
    }

    public function edit(Hidroponik $hidroponik)
    {
        return view('hidroponiks.edit', compact('hidroponik'));
    }

    public function update(Request $request, hidroponik $hidroponik)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);
        $hidroponik->update($request->all());

        return redirect()->route('hidroponiks.index')
            ->with('success', 'Dry Good updated successfully');
    }

    public function destroy(Hidroponik $hidroponik)
    {
        $hidroponik->delete();

        return redirect()->route('hidroponiks.index')
            ->with('success', 'Dry Good deleted successfully');
    }
}
