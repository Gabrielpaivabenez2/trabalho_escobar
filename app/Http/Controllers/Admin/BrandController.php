<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() { $brands = Brand::paginate(15); return view('admin.brands.index',compact('brands')); }
    public function create() { return view('admin.brands.create'); }
    public function store(Request $r) {
        $r->validate(['name'=>'required|string|unique:brands,name']);
        Brand::create($r->only('name'));
        return redirect()->route('admin.brands.index')->with('success','Marca criada.');
    }
    public function edit(Brand $brand){ return view('admin.brands.edit',compact('brand')); }
    public function update(Request $r, Brand $brand){
        $r->validate(['name'=>'required|string|unique:brands,name,'.$brand->id]);
        $brand->update($r->only('name'));
        return redirect()->route('admin.brands.index')->with('success','Marca atualizada.');
    }
    public function destroy(Brand $brand){ $brand->delete(); return redirect()->route('admin.brands.index')->with('success','Marca removida.'); }
}
