<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    public function index(){

        $tabela1 = DB::table('nome_tabelas')
        ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
        ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
        ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
        ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
        ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',5]])
        ->where('tabela1__regiao_estado.Regiao','=', 'Sudeste')
        ->where('tabela1__regiao_estado.Nome','=', 'Sao Paulo')
        ->groupByRaw('1, 3, 4, 2')
        ->orderBy('tabela1__regiao_estado.Total','ASC')
        //->limit(3)
        ->first();

        $top3Tabela1 = DB::table('nome_tabelas')
        ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
        ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
        ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
        ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
        ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',5]])
        ->groupByRaw('1, 3, 4, 2')
        ->orderBy('tabela1__regiao_estado.Total','DESC')
        ->limit(3)
        ->get();

        //dd($tabela1,$top3Tabela1->toArray(),$top3Tabela1[0]->Total);


        $search = request('search');

        if (view()->exists($search)) {
            return redirect($search);
        } else {
            return view('welcome',['search'=> $search]);
        }    

        return view('welcome');

    }

    public function lixo(Request $request){
      
        $capitais = DB::table("tabela1__capitais")
                  ->select('Nome_Capitais','id','Estado')
                  ->orderBy('Nome_Capitais', 'asc')
                  ->get();

                  //dd($capitais);

        $regiao = DB::table("tabela1__regiao_estado")
                ->select('Nome','id','Regiao')
                ->where('Nome','!=','Brasil')
                ->where('id','<=','6')
                ->orderBy('Nome', 'asc')
                ->get();
           
        $dados = DB::table("nome_tabelas")  
                ->select('id','nome_tabelas')
                ->orderBy('id','asc')
                ->get();      

        return view('lixo',[
            'capitais'=> $capitais,
            'regiao' => $regiao,
            'dados' => $dados
        ]);
    }  

}//fim do class event controler