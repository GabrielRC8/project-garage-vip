<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Configuration;
use App\Repositories\UserRepository;
use App\Repositories\GroupRepository;

use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    protected $users;
    protected $groups;

    public function __construct(UserRepository $users, GroupRepository $groups)
    {
        $this->middleware('auth');

        $this->users  = $users;

        $this->groups = $groups;
    }

    private function rules(User $user = null) {

        if( $user ) {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'status' => 'required'
            ];
        }

        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'status' => 'required'
        ];
    }

    private function attributes()
    {
        return [
            'name'          => 'usuário'
        ];
    }

    public function index()
    {
        return view('Project.user.index', [
            'users' => $this->users->all(),

            'status' => ["Inativo", "Ativo", "Excluido", "Bloqueado"]
        ]);
    }

    public function create()
    {
        return view('Project.user.create', [
            'groups' => $this->groups->allSelectForm()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules());
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        // Default Password
        $configuration = Configuration::all()->first();
        if( $configuration == null ) {

            $configuration = Configuration::create([
                'default_password' => '123mudar',
            ]);
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'group_id'  => $request->group_id,
            'status'    => $request->status,
            'password'  => bcrypt($configuration->default_password)
        ]);

        Session::flash('flash_message', 'Usuário criado com sucesso.');

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('Project.user.edit', [
            'user'   => $user,
            'groups' => $this->groups->allSelectForm()
        ]);
    }

    public function currentUser()
    {
        return view('Project.user.currentUser', [
            'user'   => Auth::user(),
            'groups' => $this->groups->allSelectForm()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules($user));
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user->fill($data)->save();

        Session::flash('flash_message', 'Usuário atualizado com sucesso.');

        return redirect()->route('user.index');
    }

    public function currentUserUpdate(Request $request, User $user)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if(! Auth::attempt(['email' => Auth::user()->email, 'password' => $request->current_password])) {

            return redirect()->route('currentUser.index')
                             ->withErrors(['current_password' => 'Senha atual não confere.']);
        }

        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('flash_message', 'Usuário atualizado com sucesso.');

        return redirect()->route('currentUser.index');
    }

    public function currentUserUpdateImage(Request $request, User $user)
    {
        $imageName = '';

        if( $request->file('image_profile') ) {

            $imageName = Auth::user()->id . "_" . strtotime("now") . '.' . $request->file('image_profile')->getClientOriginalExtension();
            $request->file('image_profile')->move(
                base_path() . '/storage/app/public/user/', $imageName
            );

            $img = Image::make(base_path() . '/storage/app/public/user/' . $imageName);
            $img->resize(250, 250);
            $img->save(base_path() . '/storage/app/public/user/' . $imageName);
        }

        $user->image = $imageName;
        $user->save();

        Session::flash('flash_message', 'Imagem atualizada com sucesso.');

        return redirect()->route('currentUser.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        $this->users->delete($user);

        Session::flash('flash_message', 'Usuário deletado com sucesso.');

        return redirect()->route('user.index');
    }
}
