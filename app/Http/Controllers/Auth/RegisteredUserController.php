<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
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
        $roles = Roles::all();
        return view('auth.register',compact('roles'));
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
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'roles_id' => 'required'
        // ],[
        //     'name.required' => 'Le champs nom est requis',
        //     'email.required' => 'Le champs email est requis',
        //     'password.required' => 'Le mot de passe est requis',
        //     'roles_id.required' => 'Son role est requis'
        // ]);

        if( ($request->name == null) || ($request->email == null) || ($request->roles_id == null) || ($request->password == null) || ($request->passwordconfirm == null)){

            return redirect(route('inscription'))->with('erreur','Tous les champs doivent-être remplir :( ! ');
        }else if($request->password != $request->passwordconfirm ){
            return redirect(route('inscription'))->with('erreur','Les deux mot de passe ne correspond pas :( ! ');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        return redirect(route('directions.index'));
    }
}
