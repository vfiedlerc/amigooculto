<?php

namespace App\Http\Controllers;

use App\Sorteio;
use App\User;
use App\Resultado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class SorteioController extends Controller
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
    
        $sorteios = DB::table('preview')
                    ->where('user_id','=',Auth::id())            
                    ->simplePaginate(3);
        //dd($sorteios);
        return view('sorteios',['sorteios' => $sorteios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrasorteio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sorteio = new Sorteio();
        $dado = $request->descricao;
        $sorteio->descricao = $dado."--".Auth::user()->nome;
        $sorteio->save(); 
        return redirect('home')->with('status', 'Sorteio '.$dado."--".Auth::user()->nome.' cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sorteio  $sorteio
     * @return \Illuminate\Http\Response
     */
    public function verificaSorteou()
    {
        $id = Cookie::get('sorteio_atual');
        $user_id = Auth::id();
        $res = DB::table('resultados')
            ->select('sorteou')
            ->where('sorteou','=',1)
            ->where('id_sorteio','=',$id)
            ->where('id_usuario','=',$user_id)
            ->get();
        return $res;
    }
    public function show(Request $req,$id)
    {
        $dados = DB::table('preview')->where([
            ['sorteio_id', '=', $id],
        ])->get();

        Cookie::queue('sorteio_atual', $id, 5);
        
        $verifica = $this->verificaSorteou();
        //dd($dados);
        return view('visualizasorteio',['dados'=>$dados,
                                        'sorteou'=>$verifica]);
    }


}
