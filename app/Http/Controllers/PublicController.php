<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['brand','carModel','color'])->paginate(12);
        return view('public.index', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with(['brand','carModel','color'])->findOrFail($id);
        return view('public.show', compact('vehicle'));
    }
}
