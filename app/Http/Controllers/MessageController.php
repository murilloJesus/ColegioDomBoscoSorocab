<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Message::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $try = Message::create($request->post());

        if($try){
            return view('pages.contato')->with(['response' => 'Sua mensagem foi enviada! Agradecemos o contato', 'page' => 'contato']);
        }else{
            return view('pages.contato')->with(['response' => 'Algo deu errado. Tente novamente mais tarde', 'page' => 'contato']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        if(!$message->status){
            $message->status = true;
            $message->save();
        }

        return $message;
    }
}
