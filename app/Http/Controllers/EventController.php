<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
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

    public function dados(Request $request){
      
        // $row = 1;
        // if (($handle = fopen(storage_path().'/app/public/dados.csv','r')) !== FALSE) {
        //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //         $num = count($data);
        //         echo "<p> $num campos na linha $row: <br /></p>\n";
        //         $row++;
        //         for ($c=0; $c < $num; $c++) {                
        //             echo $data[$c] . "<br />\n";
        //         }
                
        //     }
        //     fclose($handle);
        //}

        

        return view('dados');
    }  

    public function dadosTeste(){
       
          
         
    }



}//fim do class event controler