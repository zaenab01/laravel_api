<?php

namespace App\Http\Controllers;
use App\Models\Fruit;
use Illuminate\Http\Request;


class FruitController extends Controller
{
    public function index()
    {
        $fruits = Fruit::latest()->paginate(5);

        return view('fruits.index', compact('fruits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('fruits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);

        Fruit::create($request->all());

        return redirect()->route('fruits.index')
            ->with('success', 'Dry Good created successfully.');
    }

    public function show(Fruit $fruit)
    {
        return view('fruits.show', compact('fruit'));
    }

    public function edit(Fruit $fruit)
    {
        return view('fruits.edit', compact('fruit'));
    }

    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'location' => 'required',
            'cost' => 'required'
        ]);
        $fruit->update($request->all());

        return redirect()->route('fruits.index')
            ->with('success', 'Dry Good updated successfully');
    }

    public function destroy(Fruit $fruit)
    {
        $fruit->delete();

        return redirect()->route('fruits.index')
            ->with('success', 'Dry Good deleted successfully');
    }
}
