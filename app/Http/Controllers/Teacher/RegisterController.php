<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/portal/home';

    public function showRegisterForm()
    {
        $guard = 'teacher';
        $access_code = null;
        return view('teacher.auth.register', compact('guard', 'access_code'));
    }

    public function register(RegisterRequest $request)
    {
        //if request has access code create a user attached to organization
        if($request->filled('access_code')) {
            event(new Registered($user = Organization::find($request->access_code)->teachers()->create($request->all())));
        }else{
            event(new Registered($user = $this->create($request->all())));
            $user->deactivate();
        }

        
        $credentials = [
                'email'    => $request->email,
                'password' => $request->password,
            ];

        $this->guard()->login($user);

        return $this->registered($request, $user)
                         ?: redirect(route('teacher.home'));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Teacher::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
    }
}
