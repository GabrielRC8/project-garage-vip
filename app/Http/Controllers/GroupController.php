<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Session;
use App\Http\Requests;
use App\Group;
use App\Page;
use App\Repositories\GroupRepository;

class GroupController extends Controller
{
    protected $groups;

    public function __construct(GroupRepository $groups)
    {
        $this->middleware('auth');

        $this->groups = $groups;
    }

    private function rules()
    {
        return [
            'name' => 'required|max:200',
            'home' => 'required|max:200'
        ];
    }

    private function attributes()
    {
        return [
            'name'          => 'grupo'
        ];
    }

    public function index()
    {
        return view('Project.group.index', [
            'groups' => $this->groups->all(),

            'status' => ["Inativo", "Ativo", "Excluído"]
        ]);
    }

    public function create()
    {
        return view('Project.group.create');
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

        Group::create([
            'name'   => $request->name,
            'home'   => $request->home,
            'status' => $request->status
        ]);

        Session::flash('flash_message', 'Grupo criado com sucesso.');

        return redirect()->route('group.index');
    }

    public function edit(Group $group)
    {
        $pages = Page::all();

        $pages_of_group = array();
        foreach($group->pages as $page){
             $pages_of_group[] = $page->id;
        }

        return view('Project.group.edit', [
            'group'          => $group,
            'pages'          => $pages,
            'pages_of_group' => $pages_of_group
        ]);
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules());
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $group->fill($data)->save();

        $group->pages()->detach();
        if( $request->has('selected_pages') ) {
            $group->pages()->attach($data['selected_pages']);
        }

        Session::flash('flash_message', 'Grupo atualizado com sucesso.');

        return redirect()->route('group.index');
    }

    public function destroy(Group $group)
    {
        $this->authorize('destroy', $group);

        $this->groups->delete($group);

        Session::flash('flash_message', 'Grupo deletado com sucesso.');

        return redirect()->route('group.index');
    }

}