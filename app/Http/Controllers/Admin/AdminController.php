<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('type', '!=', 1)->get(); // 1 untuk Admin
        return view('_admins.user.index', compact('users'));
    }

    public function create()
    {
        return view('_admins.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'type' => 'required|integer|in:2,3,4', // Pastikan hanya tipe yang valid
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;

        if ($request->hasFile('profile_photo_path')) {
            $path = $request->file('profile_photo_path')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('_admins.user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('_admins.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_path')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path) {
                \Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo_path')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('_admins.user.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('_admins.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_photo_path) {
            \Storage::disk('public')->delete($user->profile_photo_path);
        }
        $user->delete();

        return redirect()->route('_admins.user.index')->with('success', 'User deleted successfully.');
    }

    // Tambahkan fungsi untuk edit profil pengguna yang sedang login

    public function myProfile()
    {
        $user = Auth::user();
        return view('_admins.profile.my_profile', compact('user'));
    }

    public function changePassword()
    {
        return view('_admins.profile.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('_admins.profile.my_profile')->with('success', 'Password changed successfully.');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('_admins.profile.edit_profile', compact('user'));
    }

    // Tambahkan fungsi untuk update profil pengguna yang sedang login
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_photo_path')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path) {
                \Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo_path')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('_admins.profile.my_profile')->with('success', 'Profile updated successfully.');
    }
}
