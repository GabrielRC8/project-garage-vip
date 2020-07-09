<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Validator;
use Session;

use App\Http\Requests;
use App\Page;

class PageController extends Controller
{
    private $pagePermission;

    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->loadPagePermission();

        $this->request = $request;
    }

    private function rules()
    {
        return [
            'name'          => 'required|max:200',
            'route_name'    => 'required|max:200',
            'route_path'    => 'required|max:200'
        ];
    }

    private function attributes()
    {
        return [
            'name'          => 'página',
            'route_name'    => 'nome da rota',
            'route_path'    => 'caminho da rota'
        ];
    }

    public function index()
    {
        return view('Project.page.index', [
            'pages'     => Page::all()
        ]);
    }

    public function create()
    {
        return view('Project.page.create');
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

        Page::create([
            'name'          => $request->name,
            'route_name'    => $request->route_name,
            'route_path'    => $request->route_path
        ]);

        Session::flash('flash_message', 'Página criada com sucesso.');

        return redirect()->route('page.index');
    }

    public function edit(Page $page)
    {
        return view('Project.page.edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules());
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $page->fill($data)->save();

        Session::flash('flash_message', 'Página atualizada com sucesso.');

        return redirect()->route('page.index');
    }

    public function destroy(Page $page)
    {
        $this->authorize('destroy', $page);

        $page->delete();

        Session::flash('flash_message', 'Página deletada com sucesso.');

        return redirect()->route('page.index');
    }

    private function loadPagePermission()
    {
        $pages = Auth::user()->group->pages;

        foreach ($pages as $page ) {
            $this->pagePermission[$page["route_name"]] = true;
        }
    }

    public function pagePermission($route_name) 
    {
        return array_key_exists($route_name, $this->pagePermission);
    }

    public function pagePermissionActive($route_name, $param = []) 
    {
        $route_path = URL::route($route_name, $param, false);
        
        $uri = explode('/', $this->request->path() )[0];

        if( $route_path == '/'.$uri )
            return 'active';

        return '';
    }

}