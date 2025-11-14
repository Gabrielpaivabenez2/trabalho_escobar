<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){ $vehicles = Vehicle::with(['brand','carModel','color'])->paginate(15); return view('admin.vehicles.index',compact('vehicles')); }

    public function create(){
        $brands = Brand::all();
        $colors = Color::all();
        return view('admin.vehicles.create', compact('brands','colors'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer|min:1886|max:'.(date('Y')+1),
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'photos' => 'required|array|min:3',
            'photos.*' => 'required|url'
        ]);

        Vehicle::create($data);
        return redirect()->route('admin.vehicles.index')->with('success','Veículo adicionado.');
    }

    public function edit(Vehicle $vehicle){
        $brands = Brand::all();
        $colors = Color::all();
        $models = CarModel::where('brand_id', $vehicle->brand_id)->get();
        return view('admin.vehicles.edit', compact('vehicle','brands','colors','models'));
    }

    public function update(Request $request, Vehicle $vehicle){
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer|min:1886|max:'.(date('Y')+1),
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'photos' => 'required|array|min:3',
            'photos.*' => 'required|url'
        ]);

        $vehicle->update($data);
        return redirect()->route('admin.vehicles.index')->with('success','Veículo atualizado.');
    }

    public function destroy(Vehicle $vehicle){
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index')->with('success','Veículo removido.');
    }
}
