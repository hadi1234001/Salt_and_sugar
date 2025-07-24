<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{

    public function index()
    {
        return response()->json(Vehicle::all());
    }

    public function store(Request $request)
    {
        $vehicle = Vehicle::create($request->all());
        return response()->json($vehicle, 201);
    }


    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'وسيلة النقل غير موجودة',
                'id' => $id
            ], 404);
        }

        return response()->json($vehicle);
    }


    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'وسيلة النقل غير موجودة',
                'id' => $id
            ], 404);
        }

        $vehicle->update($request->all());
        return response()->json($vehicle);
    }


    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'وسيلة النقل غير موجودة',
                'id' => $id
            ], 404);
        }

        $vehicle->delete();
        return response()->json([
            'message' => 'تم حذف وسيلة النقل بنجاح',
            'id' => $id
        ], 200);
    }
}
