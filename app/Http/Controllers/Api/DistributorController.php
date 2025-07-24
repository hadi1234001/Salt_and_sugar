<?php

namespace App\Http\Controllers\Api;

use App\Models\Distributor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Distributer;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DistributorController extends Controller
{

    public function index()
    {
        try{
        return response()->json(Distributer::with(['chef', 'vehicle'])->get());
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|unique:distributors,user_name',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:distributors,email',
            'password' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'chef_id' => 'required|exists:chefs,chef_id',
            'vehicle_id' => 'required|exists:vehicles,vehicle_id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['image', 'password']);
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('distributors/images', 'public');
        }

        $distributor = Distributer::create($data);
        return response()->json($distributor, 201);
    }


    public function show($id)
    {
        $distributor = Distributer::with(['chef', 'vehicle'])->find($id);

        if (!$distributor) {
            return response()->json([
                'message' => 'الموزع غير موجود',
                'id' => $id
            ], 404);
        }

        return response()->json($distributor);
    }


    public function update(Request $request, $id)
    {
        $distributor = Distributer::find($id);

        if (!$distributor) {
            return response()->json([
                'message' => 'الموزع غير موجود',
                'id' => $id
            ], 404);
        }

        $request->validate([
            'user_name' => 'required|string|unique:distributors,user_name,' . $id . ',distributor_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:distributors,email,' . $id . ',distributor_id',
            'password' => 'nullable|string|min:6',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'chef_id' => 'required|exists:chefs,chef_id',
            'vehicle_id' => 'required|exists:vehicles,vehicle_id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['image', 'password']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($distributor->image_path) {
                Storage::disk('public')->delete($distributor->image_path);
            }
            $data['image_path'] = $request->file('image')->store('distributors/images', 'public');
        }

        $distributor->update($data);
        return response()->json($distributor);
    }

    /**
     * حذف موزع
     */
    public function destroy($id)
    {
        $distributor = Distributer::find($id);

        if (!$distributor) {
            return response()->json([
                'message' => 'الموزع غير موجود',
                'id' => $id
            ], 404);
        }

        if ($distributor->image_path) {
            Storage::disk('public')->delete($distributor->image_path);
        }

        $distributor->delete();

        return response()->json([
            'message' => 'تم حذف الموزع بنجاح',
            'id' => $id
        ], 200);
    }


    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $distributor = Distributer::where('user_name', $request->user_name)->first();

        if (!$distributor || !Hash::check($request->password, $distributor->password)) {
            return response()->json([
                'message' => 'اسم المستخدم أو كلمة المرور غير صحيحة'
            ], 401);
        }

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح',
            'distributor' => $distributor->load(['chef', 'vehicle']),
            'token' => 'dummy-token-' . $distributor->distributor_id // يمكنك استبداله ب JWT لاحقاً
        ]);
    }
}
