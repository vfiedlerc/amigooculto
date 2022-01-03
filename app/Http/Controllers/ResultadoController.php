<?php

namespace App\Http\Controllers;
use App\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
class ResultadoController extends Controller
{
    public function verificaSorteou()
    {
        $id = Cookie::get('sorteio_atual');
        $user_id = Auth::id();
        $res = DB::table('resultados')
            ->select('sorteou')
            ->where('sorteou','=',1)
            ->where('id_sorteio','=',$id)
            ->where('id_usuario','=',$user_id)
            ->first();
        return $res->sorteou;
    }
    public function doSort(Request $request)
    {
        Log::debug('inicio do sorteio');
        $sorteou = Auth::id();
        $id = Cookie::get('sorteio_atual');
        $amigo = Resultado::select('id_usuario')
                                ->where('id_sorteio','=',$id)
                                ->where('id_usuario','<>',$sorteou)
                                ->where('sorteado','=',0)
                                ->inRandomOrder()
                                ->first();

        $ret = intval($amigo->id_usuario);
        Cookie::queue('sorteado_atual', $ret, 30);
        //dd($ret);
        $this->setSorteado($ret);
        $temp = Resultado::find($sorteou);
        $temp->id_sorteado = $ret;
        $temp->id_sorteio = $id;
        $temp->sorteou = 1;
        $temp->save();        
        
        $res = $this->resultado($ret);

        return redirect('home')->with('status', 'Seu amigo oculto é '.$res);

    }
    public function setSorteado($id)
    {
        $temp = Resultado::find($id);
        $temp->sorteado = 1;
        $temp->save();    
    }
    public function resultado($id)
    {
        $res = DB::table('preview')
                ->select('nome')
                ->where('user_id','=',$id)
                ->first();
        
        return $res->nome;
    }
    public function presentes($id)
    {
        $presentes = DB::table('view_presentes')
                    ->where('user_id','=',$id)
                    ->get();
        return $presentes;
    }
    

}
