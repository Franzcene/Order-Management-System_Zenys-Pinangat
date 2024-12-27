<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Carbon\Carbon;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('m'));
        $year = $request->input('year', Carbon::now()->format('Y'));

        $materials = Material::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->paginate(10);
        return view('materials.index', compact('materials', 'month', 'year'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'unit_cost' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'created_at' => 'nullable|date',
        ]);

        $material = new Material();
        $material->name = $request->name;
        $material->unit = $request->unit;
        $material->unit_cost = $request->unit_cost;
        $material->quantity = $request->quantity;

        // Assign created_at or default to now
        $material->created_at = $request->created_at ?? now();

        $material->save();

        return redirect()->route('materials.index')->with('success', 'Material added successfully!');
    }


    public function edit($id)
    {
        $material = Material::find($id);
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $material->name = $request->name;
        $material->unit = $request->unit;
        $material->unit_cost = $request->unit_cost;
        $material->quantity = $request->quantity;
        $material->save();

        return redirect()->route('materials.index')->with('success', 'Material updated successfully!');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material deleted successfully!');
    }
}
