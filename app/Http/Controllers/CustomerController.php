<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Address;
use App\Telephone;
use App\Car;

use App\Http\Requests;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Project.customer.index');
    }

    public function store(Request $request)
    {

        dd($request->all());

        Customer::create([
            'name'      => $request->name,
            'cpf'     => $request->cpf,
            'status'    => $request->status,
            
        ]);

        








        Session::flash('flash_message', 'Cliente criado com sucesso.');

        return redirect()->route('customer.index');







    } 






}
