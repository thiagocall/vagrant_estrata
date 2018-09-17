<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContatoController extends Controller
{
    public function  index(){
        $data['titulo']="Contato";
        return view('contato', $data);
        
    }
    
    public function enviar(Request $request){
        
        $dadosEmail = array(
            
            'nome' => $request->input('nome'),
             'email' => $request->input('email'),
             'assunto' => $request->input('assunto'),
             'msg' => $request->input('msg')  
        );
        
        
    Mail::send('email.contato',$dadosEmail, function($message){
        
        $message->from('formulario@pontocomdesenvolvimento.net', 'Formulário de Contato');
        $message->subject('Mensagem enviada pelo formulário de contato');
        $message->to('call.thiago@gmail.com');
    });
    
     return redirect('contato')->with('success','Menssagem Enviada, em breve entraremos em contato!'); 
    
}

}
