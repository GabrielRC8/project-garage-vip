<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use League\Flysystem\Config;
use Validator;
use Session;

use App\Http\Requests;
use App\Configuration;


class ConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules()
    {
        return [
            'default_password' => 'required|min:6',
        ];
    }

    private function attributes()
    {
        return [
            'default_password' => 'senha padrão'
        ];
    }

    public function index()
    {
        $configuration = Configuration::all()->first();

        if( $configuration == null ){

            $configuration = Configuration::create([
                'default_password' => '123mudar',
            ]);

        }

        return redirect()->route('configuration.edit', $configuration);
    }

    public function edit(Configuration $configuration)
    {
        return view('Project.configuration.edit', [
            'configuration' => $configuration,
        ]);
    }

    public function update(Request $request, Configuration $configuration)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules());
        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $configuration->fill($data)->save();

        Session::flash('flash_message', 'Configurações atualizadas com sucesso.');

        return redirect()->route('configuration.edit', $configuration);
    }
}
