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
        $search = request('search');

        if (view()->exists($search)) {
            return redirect($search);
        } else {
            return view('welcome',['search'=> $search]);
        }    

        return view('welcome');

    }

    public function lixo(Request $request){

         $iteration = "";
         $total =0;

        $capitaisName = DB::table("tabela1__capitais")
                ->select('Nome_Capitais','id','Estado')
                ->orderBy('Nome_Capitais', 'asc')
                ->get();
     
        if($request->dataString == "Coeficiente de variacao - Domicilios com lixo coletado por servico de limpeza (%)"){
            $iteration='1';
            $capitais = DB::table("tabela1__capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

           $total = $capitais->Total;
                
        }elseif($request->dataString == "Coeficiente de variacao - Percentual de domicilios com lixo coletado por servico de limpeza (%)"){
            $iteration='2';
            $capitais = DB::table("tabela2__capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }elseif($request->dataString == 'Domicilios com lixo coletado por serviio de limpeza (Mil domicilios)'){
            $iteration='3';
            $capitais = DB::table("tabela3_capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }elseif($request->dataString == 'Domicilios com lixo coletado por servico de limpeza, considerando um intervalo de confianca de 95% - limite inferior (Mil domicilios)'){
            $iteration='4';
            $capitais = DB::table("tabela4_capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }elseif($request->dataString == 'Percentual de domicilios com lixo coletado por servico de limpeza (%)'){
            $iteration='5';
            $capitais = DB::table("tabela5_capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }elseif($request->dataString == 'Percentual de domicilios com lixo coletado por servico de limpeza, considerando um intervalo de confianca de 95% - limite inferior (%)'){
            $iteration='6';
            $capitais = DB::table("tabela6_capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }elseif($request->dataString == 'Percentual de domicilios com lixo coletado por servico de limpeza, considerando um intervalo de confianca de 95% - limite superior (%)'){
            $iteration='7';
            $capitais = DB::table("tabela7_capitais")
                ->select('Nome_Capitais','id','Estado','Total')
                ->where('Nome_Capitais','=',$request->capitais)
                ->orderBy('Nome_Capitais', 'asc')
                ->first();

                $total = $capitais->Total;

        }   

        //dd($capitais);
        // dd($request->all(),$request->dataString,$capitais,$iteration,$request->capitais,$total);

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

        $capitais = "";


                // if ($capitais) {
                //     $success = true;
                //     $message = "User deleted successfully";
                // } else {
                //     $success = false;
                //     $message = "User not found";
                // }

       return view('lixo',[
            'capitaisName'=> $capitaisName,
            'capitais'=> $capitais,
            'regiao' => $regiao,
            'dados' => $dados,
            'total' => $total,
        ]);

        // return response()->json([
        //     'success' => $success,
        //     'message' => $message,
        // ]);
    }

}//fim do class event controler