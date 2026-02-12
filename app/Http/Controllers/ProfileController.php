<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // VIEW PROFILE
    public function index()
    {
        return view('profile');
    }

    // EDIT PROFILE PAGE
    public function edit()
    {
        return view('profile-edit');
    }

    // UPDATE PROFILE
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update image
        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('profiles'), $imageName);
            $user->profile_image = $imageName;
        }

        // Update details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully');
    }
    // =========================
// 📍 SAVED ADDRESSES PAGE
// =========================
public function addresses()
{
    $addresses = auth()->user()
        ->addresses()
        ->get()
        ->keyBy('label');

    return view('profile.addresses', compact('addresses'));
}

// =========================
// 💾 SAVE / UPDATE ADDRESS
// =========================
public function storeAddress(Request $request)
{
    $request->validate([
        'label'   => 'required|in:address1,address2',
        'name'    => 'required',
        'email'   => 'required|email', 
        'phone'   => 'required',
        'address' => 'required',
        'city'    => 'required',
        'pincode' => 'required',
        'map_link'=> 'nullable'
    ]);

    Address::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'label'   => $request->label,
        ],
        [
            'name'     => $request->name,
            'email'    => $request->email, 
            'phone'    => $request->phone,
            'address'  => $request->address,
            'city'     => $request->city,
            'pincode'  => $request->pincode,
            'map_link' => $request->map_link,
        ]
    );

    return response()->json([
    'success' => true,
    'message' => ucfirst($request->label) . ' saved successfully'
]);


}
// Show change password page
public function changePassword()
{
    // simple captcha numbers
    $a = rand(1, 9);
    $b = rand(1, 9);

    session([
        'captcha_answer' => $a + $b
    ]);

    return view('profile.change-password', compact('a', 'b'));
}

// Update password
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password'     => 'required|min:6|confirmed',
        'captcha'          => 'required'
    ]);

    // captcha check
    if ($request->captcha != session('captcha_answer')) {
        return back()->withErrors(['captcha' => 'Captcha answer is incorrect']);
    }

    // current password check
    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors(['current_password' => 'Current password is wrong']);
    }

    // update password
    auth()->user()->update([
        'password' => Hash::make($request->new_password)
    ]);

    Session::forget('captcha_answer');

    return back()->with('success', 'Password changed successfully');
}

}