<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LandController extends Controller
{
    public function inicio()
    {
        $qtd_presentes = DB::table('presentes')
                         ->count('id');
        $qtd_user = DB::table('sorteios')  
                    ->count('id');
        $qtd_sort = DB::table('users')  
                    ->count('id');
        return view('welcome',['qtd_user'=>$qtd_user,
                                'qtd_sort'=>$qtd_sort,
                                'qtd_pre' => $qtd_presentes]);

    }
}
