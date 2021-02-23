<?php

namespace App\Http\Controllers;
use App\Models\Vegetable;
use Illuminate\Http\Request;


class VegetableController extends Controller
{
    public function index()
    {
        $vegetables = Vegetable::latest()->paginate(5);

        return view('vegetables.index', compact('vegetables'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('vegetables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);

        Vegetable::create($request->all());

        return redirect()->route('vegetables.index')
            ->with('success', 'Dry Good created successfully.');
    }

    public function show(Vegetable $vegetable)
    {
        return view('vegetables.show', compact('vegetable'));
    }

    public function edit(Vegetable $vegetable)
    {
        return view('vegetables.edit', compact('vegetable'));
    }

    public function update(Request $request, vegetable $vegetable)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);
        $vegetable->update($request->all());

        return redirect()->route('vegetables.index')
            ->with('success', 'Dry Good updated successfully');
    }

    public function destroy(Vegetable $vegetable)
    {
        $vegetable->delete();

        return redirect()->route('vegetables.index')
            ->with('success', 'Dry Good deleted successfully');
    }
}
