<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatedData =$request->validated();
        $validatedData ['status']= $request->status == true? '1':'0';
        Color::create($validatedData);
        return redirect()->route('color.index')->with('message', 'Color Added Successfully');
    }
    public function edit( $id)
    {
        $data=Color::find($id);
        return view('admin.colors.edit', compact('data'));
    }
    public function update(ColorFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $validatedData ['status']= $request->status == true? '1':'0';
        Color::find($id)->update($validatedData);
        return redirect()->route('color.index')->with('message', 'Color updated Successfully');
    }
    public function destroy($id)
    {
        $Color = Color::findOrFail($id);
        $Color->delete();
        return redirect()->route('color.index')->with('message', 'Color Deleted Successfully');

    }
}
