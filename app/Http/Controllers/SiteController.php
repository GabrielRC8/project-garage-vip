<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Mail;
use Session;
use App\Domain;
use App\Html;

class SiteController extends Controller
{
    public function index()
    {
        return view('Project.site.index');
    }

    public function notfound()
    {
        return view('Project.site.404');
    }
    
    public function sendContact(Request $request)
    {
        $data = $request->all();
        
//        return view('Project.site.sendContact',[
//            'data' => $data
//        ]);

        $validator = Validator::make($data, [
            'name'          => 'required|max:200',
            'email'         => 'required|email',
            'message'       => 'required'
        ]);
        $validator->setAttributeNames([
            'name'          => 'Nome',
            'email'         => 'Email',
            'message'       => 'Mensagem'
        ]);

        if ($validator->fails()) {
            return redirect('/#footer')
                        ->withErrors($validator)
                        ->withInput();
        }

        Mail::send('Project.site.sendContact', ['data' => $data], function($m) use ($data) {
            $m->to(ENV("MAIL_TO_CONTACT_SITE"), ENV("APP_NAME"))
              ->replyTo($data['email'], $data['name'])
              ->subject('Contato do site ' . ENV("APP_NAME"));
        });

        if( count(Mail::failures()) > 0 ) {
            Session::flash('flash_error', 'Mensagem não enviada, caso o erro persista entre em contato pelo email ' . ENV("MAIL_TO_CONTACT_SITE"));
        } else {
            Session::flash('flash_message', 'Mensagem enviada com sucesso, entraremos em contato o mais rápido possível');
        }

        return redirect('/#footer');
    }
}