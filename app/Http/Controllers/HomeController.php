<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {

        // SUM(user_id) FROM sorteio_user WHERE user_id = 1 
        $sql = DB::table('sorteio_user')
            ->where('user_id', '=', Auth::user()->id)  
            ->count();
    
        //dd($sql);

        $presentes = DB::table('presentes')
                    ->where('user_id','=',Auth::user()->id)
                    ->get();

        $sorteado = Cookie::get('sorteado_atual');
        if($this->verificaSorteou()){
            $presentes_sorteado = DB::table('presentes')
                    ->where('user_id','=',$sorteado)
                    ->get();
            $info_user = $this->descobreUser();
            return view('home',['num' => $sql,
                    'presentes'=>$presentes,
                    'presentes_usuario'=>$presentes_sorteado,
                    'dados_user'=>$info_user]);
        }
        
        return view('home',['num' => $sql,
                            'presentes'=>$presentes]);
    }
    public function descobreUser()
    {
        $sorteado = Cookie::get('sorteado_atual');
        $sql = DB::table('preview')
                ->select('nome','email')
                ->where('user_id','=',$sorteado)
                ->first();
        return $sql;
    }
    public function verificaSorteou()
    {
        $user_id = Auth::id();
        $res = DB::table('resultados')
            ->select('sorteou')
            ->where('sorteou','=',1)
            ->where('id_usuario','=',$user_id)
            ->get();
        return $res;
    }
    
}
