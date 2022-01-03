<?php

namespace App\Http\Controllers;

use App\Participante;
use App\User;
use App\Sorteio;
use App\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
class ParticipanteController extends Controller
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
        $usuarios = User::select('id','nome','email')->get();
        $sorteios = Sorteio::all();
        return view('addpart',[
            'usuarios' => $usuarios,
            'sorteios' => $sorteios
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $id_usuario = $request->usuario;
            $id_sorteio = $request->sorteio;
            $user = User::find($id_usuario);
            $user->sorteios()->attach($id_sorteio);
        }catch(Exception $e){
            return redirect('home')->with('error', 'Entrada duplicada, inserção negada');
        }
        

        $data = new Resultado();
        $data->id_sorteio = $id_sorteio;
        $data->id_usuario = $id_usuario;
        $data->save();

        return redirect('home')->with('status', 'Vinculo realizado com sucesso');
    }

}
