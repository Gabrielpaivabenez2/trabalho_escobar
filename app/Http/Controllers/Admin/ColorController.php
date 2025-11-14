<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() { 
        $colors = Color::paginate(15); 
        return view('admin.colors.index', compact('colors')); 
    }

    public function create() { 
        return view('admin.colors.create'); 
    }

    public function store(Request $r) {
        $r->validate(['name'=>'required|string|unique:colors,name']);
        Color::create($r->only('name'));
        return redirect()->route('admin.colors.index')->with('success','Cor criada.');
    }

    public function edit(Color $color){ 
        return view('admin.colors.edit', compact('color')); 
    }

    public function update(Request $r, Color $color){
        $r->validate(['name'=>'required|string|unique:colors,name,'.$color->id]);
        $color->update($r->only('name'));
        return redirect()->route('admin.colors.index')->with('success','Cor atualizada.');
    }

    public function destroy(Color $color){ 
        $color->delete(); 
        return redirect()->route('admin.colors.index')->with('success','Cor removida.'); 
    }
}
