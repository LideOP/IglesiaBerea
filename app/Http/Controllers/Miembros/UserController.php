<?php

namespace App\Http\Controllers\miembros;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

// use Laravel\Fortify\Contracts\CreatesNewUsers;
// use Laravel\Fortify\Contracts\RegisterResponse;
// use Laravel\Fortify\Fortify;
// use Illuminate\Support\Str;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    
    protected $guard;
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.users.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion =$request->validate([
            'nombre'    => 'required|max:10',
            'email'    => 'required|max:20|unique:users|string|email',
            'password'  => 'required|min:4|string|confirmed',

        ]);

        $user = new User();
        $user->name = $validacion['nombre'];
        $user->email = $validacion['email'];
        $user->password = Hash::make($validacion['password']);
        $user->save();
        return back()->with('message','ok');
    }

    // public function store(Request $request,CreatesNewUsers $creator): RegisterResponse
    // {
    //     if (config('fortify.lowercase_usernames')) {
    //         $request->merge([
    //             Fortify::username() => Str::lower($request->{Fortify::username()}),
    //         ]);
    //     }

    //     event(new Registered($user = $creator->create($request->all())));

    //     $this->guard->login($user);

    //     return app(RegisterResponse::class);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
