<?php

namespace App\Http\Controllers;
use App\Participante;
use App\Presente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PresenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $presente = new Presente();
        $dado = $request->presente;
        $possui = $request->possui;

        $presente->descricao = $dado;
        $presente->possui = $possui;
        $presente->user_id = $id;
        $presente->save();

        return redirect('home')->with('status', 'Seu presente foi adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presente  $presente
     * @return \Illuminate\Http\Response
     */
}
