<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\informacoes_post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    public function index(){
        // $search = request('search');

        // if (view()->exists($search)) {
        //     return redirect($search);
        // } else {
        //     return view('welcome',['search'=> $search]);
        // }    

        return view('welcome');

    }

    public function lixo(Request $request){

        $capitaisName =  DB::table('todas_capitais')
                        ->select('Nome_Capitais','Nome_tabela','Regiao','Total')
                        ->orderBy('Nome_Capitais','asc')
                        ->get();
           
        $dados = DB::table("nome_tabelas")  
                ->select('id','nome_tabelas')
                ->where('id','<=','7')
                ->orderBy('id','asc')
                ->get();      

        $total = DB::table('todas_capitais')
                ->select('Nome_Capitais','Total','Nome_tabela')
                ->get();



       return view('lixo',[
            'capitaisName'=> $capitaisName,
            'dados' => $dados,
            'total' => $total,
        ]);


    }

    public function moradores(Request $request){

        $capitaisName2 =  DB::table('todas_capitais2')
                        ->select('Nome_Capitais','Nome_tabela','Regiao','Total')
                        ->orderBy('Nome_Capitais','asc')
                        ->get();


        $dados2 = DB::table("nome_tabelas")  
                ->select('id','nome_tabelas')
                ->where('id','>','7')
                ->orderBy('id','asc')
                ->get();  

        $total2 = DB::table('todas_capitais2')
                ->select('Nome_Capitais','Total','Nome_tabela')
                ->get();

        return view('moradores',[
            'capitaisName'=> $capitaisName2,
            'dados' => $dados2,
            'total' => $total2,
        ]);
    }

}//fim do class event controler