<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Brand;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index(){ $models = CarModel::with('brand')->paginate(15); return view('admin.car_models.index',compact('models')); }
    public function create(){ $brands = Brand::all(); return view('admin.car_models.create',compact('brands')); }
    public function store(Request $r){
        $r->validate(['brand_id'=>'required|exists:brands,id','name'=>'required|string']);
        CarModel::create($r->only('brand_id','name'));
        return redirect()->route('admin.car-models.index')->with('success','Modelo criado.');
    }
    public function edit(CarModel $car_model){ $brands = Brand::all(); return view('admin.car_models.edit', ['model'=>$car_model,'brands'=>$brands]); }
    public function update(Request $r, CarModel $car_model){
        $r->validate(['brand_id'=>'required|exists:brands,id','name'=>'required|string']);
        $car_model->update($r->only('brand_id','name'));
        return redirect()->route('admin.car-models.index')->with('success','Modelo atualizado.');
    }
    public function destroy(CarModel $car_model){ $car_model->delete(); return redirect()->route('admin.car-models.index')->with('success','Modelo removido.'); }
}
