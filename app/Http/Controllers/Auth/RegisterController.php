<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            //'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
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
        
        return User::create([
            'name' => $data['name'] ?? "",
            'email' => $data['email'] ?? "",
            'phone' => $data['phone'] ?? "",
            'address' => $data['address'] ?? "",
            'username'=>$data['username'] ?? "",
            'password' => Hash::make($data['password']),
            'active'=>1,
        ]);
    }

    public function register(Request $request)
    {
        if($request->ajax()){
            $validator = Validator::make($request->all(),  [
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'name' => ['required', 'string', 'max:255'],
                //'phone' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users'],
                'password' => ['required', 'string', 'min:1', 'confirmed'],
            ]);
            $validator= $this->validator($request->all());
            if($validator->passes()){
                event(new Registered($user = $this->create($request->all())));
                $this->guard()->login($user,false);
                return response()->json([
                    'code' => 200,
                    'data' => '',
                    'messange' => 'success',
                    'validate' => false
                ], 200);
            }else{
                return response()->json([
                    'code' => 200,
                    'htmlErrorValidate' => view('admin.components.load-error-ajax', [
                        "errors" => $validator->errors()
                    ])->render(),
                    'messange' => 'error',
                    'validate' => true
                ], 200);
            }

        }else{
            $validator= $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                        ? new JsonResponse([], 201)
                        : redirect($this->redirectPath());
        }

    }


    // show register for admin
    // public function showAdminRegisterForm()
    // {
    //     return view('auth.register', ['url' => 'admin']);
    // }

    // protected function createAdmin(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $admin = Admin::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //         'active'=>1,
    //     ]);
    //     return redirect()->intended('login/admin');
    // }

}
