<?php

namespace App\Http\Controllers\Api;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class ChefController extends Controller
{

    public function index()
    {
        try {
            return response()->json(Chef::with('state')->get());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {

        try {

            $request->validate([
                'user_name' => 'required|string|unique:chefs,user_name',
                'first_name' => 'required|string|max:255',
                'second_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:chefs,email',
                'password' => 'required|string|min:6',
                'mobile_number' => 'nullable|string|max:20',
                'birth_date' => 'nullable|date',
                'overview' => 'nullable|string',
                'state_id' => 'nullable|exists:states,state_id',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
            ]);

            $data = $request->except(['image', 'cv', 'password']);
            $data['password'] = Hash::make($request->password);


            if ($request->hasFile('image')) {
                $data['image_path'] = $request->file('image')->store('chefs/images', 'public');
            }


            if ($request->hasFile('cv')) {
                $data['cv_path'] = $request->file('cv')->store('chefs/cvs', 'public');
            }

            $chef = Chef::create($data);
            return response()->json($chef, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $chef = Chef::with('state')->find($id);

        if (!$chef) {
            return response()->json([
                'message' => 'الشيف غير موجود',
                'id' => $id
            ], 404);
        }

        return response()->json($chef);
    }


    public function update(Request $request, $id)
    {
        try{
        $chef = Chef::find($id);

        if (!$chef) {
            return response()->json([
                'message' => 'الشيف غير موجود',
                'id' => $id
            ], 404);
        }

        $request->validate([
            'user_name' => 'string|unique:chefs,user_name,' . $id . ',chef_id',
            'first_name' => 'string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'email|unique:chefs,email,' . $id . ',chef_id',
            'password' => 'nullable|string|min:6',
            'mobile_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'overview' => 'nullable|string',
            'state_id' => 'nullable|exists:states,state_id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
        ]);

        $data = $request->except(['image', 'cv', 'password']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($chef->image_path) {
                Storage::disk('public')->delete($chef->image_path);
            }
            $data['image_path'] = $request->file('image')->store('chefs/images', 'public');
        }

        // حذف ملف CV القديم إذا تم رفع ملف جديد
        if ($request->hasFile('cv')) {
            if ($chef->cv_path) {
                Storage::disk('public')->delete($chef->cv_path);
            }
            $data['cv_path'] = $request->file('cv')->store('chefs/cvs', 'public');
        }

        $chef->update($data);
        return response()->json($chef);
    }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $chef = Chef::find($id);

        if (!$chef) {
            return response()->json([
                'message' => 'الشيف غير موجود',
                'id' => $id
            ], 404);
        }

        // حذف الصورة وملف CV من السيرفر
        if ($chef->image_path) {
            Storage::disk('public')->delete($chef->image_path);
        }
        if ($chef->cv_path) {
            Storage::disk('public')->delete($chef->cv_path);
        }

        $chef->delete();

        return response()->json([
            'message' => 'تم حذف الشيف بنجاح',
            'id' => $id
        ], 200);
    }


public function login(Request $request)
{
    try {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $chef = Chef::where('email', $credentials['email'])->first();

        if (!$chef || !Hash::check($credentials['password'], $chef->password)) {
            return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
        }

        // إنشاء رمز مميز (Token) باستخدام Sanctum أو JWT
        $token = $chef->createToken('chef-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'chef' => $chef
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
