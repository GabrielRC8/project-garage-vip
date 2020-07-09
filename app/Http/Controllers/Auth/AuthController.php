<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $group)
    {
        if( $group->id == 3 ) {

            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                //'document' => 'required|max:255'
            ]);
        }

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $group)
    {
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'group_id'  => $group->id,
            'password'  => bcrypt($data['password']),
            'status'    => 1
        ]);

        if( $group->id == 3 ) {

            //$user->document = $data['document'];
            $user->save();
        }

        return $user;
    }

    public function register(Request $request)
    {
        $group = $this->getGroup();

        $data = $request->all();

        $validator = $this->validator($data, $group);
        $validator->setAttributeNames([
            'name' => 'nome',
            'email' => 'email',
            //'document' => 'cpf'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($data, $group));

        return redirect('/register');
    }

    private function getGroup() {

        $group = Group::all()->first();

        if( $group == null ){

            $group = Group::create([
                'name'   => 'Desenvolvedor',
                'home'   => '/group',
                'status' => 1
            ]);

            $group->pages()->create([
                'name'          => 'Grupos',
                'route_name'    => 'group.index',
                'route_path'    => '/group'
            ]);

            $group->pages()->create([
                'name'          => 'Páginas',
                'route_name'    => 'page.index',
                'route_path'    => '/page'
            ]);

            $group->pages()->create([
                'name'          => 'Usuários',
                'route_name'    => 'user.index',
                'route_path'    => '/user'
            ]);

            $group->pages()->create([
                'name'          => 'Meu Cadastro',
                'route_name'    => 'currentUser.index',
                'route_path'    => '/current-user'
            ]);

            $group->pages()->create([
                'name'          => 'Configurações',
                'route_name'    => 'configuration.index',
                'route_path'    => '/configuration'
            ]);

        } else {
            
            $group = Group::where('status', 1)->where('name','Administrador')->first();

            if( $group == null ) {

                $group = Group::create([
                    'name'   => 'Administrador',
                    'home'   => '/home-admin',
                    'status' => 1
                ]);

                $group->pages()->create([
                    'name'          => 'Home',
                    'route_name'    => 'homeAdmin.index',
                    'route_path'    => '/home-admin'
                ]);

            } else {

                $group = Group::where('status', 1)->where('name','Usuario')->first();

                if( $group == null ) {

                    $group = Group::create([
                        'name'   => 'Usuario',
                        'home'   => '/home-user',
                        'status' => 1
                    ]);

                    $group->pages()->create([
                        'name'          => 'Home',
                        'route_name'    => 'homeUser.index',
                        'route_path'    => '/home-user'
                    ]);

                }

            }

        }

        return $group;
    }
}