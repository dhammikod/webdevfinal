<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('signin', [
            'pagetitle' => 'Sign In'
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->registername,
            'profile_picture' => "",
            'email' => $request->registeremail,
            'password' => Hash::make($request->registerpassword),
            'status' => 'user',
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login'));
    }

    public function update(request $request)
    {
        //
        $user = Auth::user();
        $id = $user['id'];
        $user = User::findOrFail($id);


        if ($request->oldpassword != "") {
            if (Hash::check($request->oldpassword, $user['password'])) {
                if ($request->newpassword == $request->newpassword2) {
                    $user->update([
                        "name" => $request->name,
                        "email" => $request->email,
                        "password" => Hash::make("$request->newpassword"),
                    ]);
                }
            }
        } else {
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);
        }



        return redirect("/dashboard");
    }

    public function updateAdmin(request $request)
    {
        //
        $user = Auth::user();
        $id = $user['id'];
        $user = User::findOrFail($id);


        if ($request->adminOldPass != "") {
            if (Hash::check($request->adminOldPass, $user['password'])) {

                $user->update([
                    "name" => $request->adminName,
                    "email" => $request->adminEmail,
                    "password" => Hash::make("$request->adminNewPass"),
                ]);
            }
        } else {
            $user->update([
                "name" => $request->adminName,
                "email" => $request->adminEmail,
            ]);
        }

        return redirect("/admin-profile");
    }
}
