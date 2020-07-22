<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use DB;

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

        $customerData  = DB::table('customers')->where('cpf', $request->cpf)->value('cpf');


        dd($request->all(),$customerData );

        if ($request->cpf === $customerData ) {
            
            return redirect()->route('customer.index')
                ->withErrors(['Cliente já cadastrado.']);
        }

        
        
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->cpf = $request->cpf;
        $customer->fone = $request->fone;
        $customer->fone_2 = $request->fone_2;
        $customer->street = $request->street;
        $customer->number = $request->number;
        $customer->zipcode = $request->zipcode;
        $customer->status = $request->status;
        $customer->save();

        
     
        Session::flash('flash_message', 'Cliente criado com sucesso.');

        return redirect()->route('customer.index');

    } 


    public function search(Request $request)
    {
        
        
        $customerData = DB::table('customers')->where('cpf', $request->cpf)->value('cpf');

            if ( $request->cpf  === $customerData ) {
                Session::flash('flash_message', 'Cliente já cadastrado.');
                return redirect()->route('customer.index');
            }
        
                 return redirect()->route('customer.index')
                ->withErrors(['Cliente não cadastrado.']);

        
        
        
    }





}
