<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function settings()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Jika profile tidak ada, buat profile baru dengan nilai default
        if (!$profile) {
            $profile = new Profile([
                'gender' => 'Laki-laki', // atau 'Perempuan'
                'date_of_birth' => now()->subYears(20), // contoh default
                'photo' => 'path/to/default/photo.jpg', // path foto default
            ]);
            $user->profile()->save($profile); // Simpan profil baru
        }

        return view('profile.setting', compact('user', 'profile'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Jika profile tidak ada, buat profile baru dengan nilai default
        if (!$profile) {
            $profile = new Profile([
                'gender' => 'Laki-laki', // atau 'Perempuan'
                'date_of_birth' => now()->subYears(20), // contoh default
                'photo' => 'path/to/default/photo.jpg', // path foto default
            ]);
            $user->profile()->save($profile);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        $user->name = $request->name;
        $user->save();

        $profile->gender = $request->gender;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->save();

        return redirect()->route('settings')->with('success', 'Profile berhasil diupdate.');
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Jika profile tidak ada, buat profile baru dengan nilai default
        if (!$profile) {
            $profile = new Profile([
                'gender' => 'Laki-laki', // atau 'Perempuan'
                'date_of_birth' => now()->subYears(20), // contoh default
                'photo' => 'path/to/default/photo.jpg', // path foto default
            ]);
            $user->profile()->save($profile);
        }

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = 'profile' . time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/profile'), $imageName);
            $profile->photo = 'images/profile/' . $imageName;
            $profile->save();
        }

        return redirect()->route('settings')->with('success', 'Foto berhasil diupdate.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:6',
            'new_password' => ['required','string','min:6', 'confirmed'],
            'new_password_confirmation' => 'required|string|min:6',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('settings')->with('error', 'Password lama salah.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silahkan login kembali.');
    }
}
