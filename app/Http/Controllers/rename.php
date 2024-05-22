<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function elenco(){
      
        // Esempio di dati delle attività
        $activities = [
            ["id" => 1, "title" => "Attività 1", "price" => "10 $", "productor" => "Artuu", "img" => "https://images.pexels.com/photos/1472887/pexels-photo-1472887.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["id" => 2, "title" => "Attività 2", "price" => "120 $", "productor" => "Jhon", "img" => "https://images.pexels.com/photos/547116/pexels-photo-547116.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["id" => 3, "title" => "Attività 3", "price" => "303 $", "productor" => "Mett", "img" => "https://images.pexels.com/photos/1543756/pexels-photo-1543756.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"]
        ];
        
        return view('activity.elenco',
        ["activities"=>$activities]
    );
    }

    public function singola($id){
        return view('activity.singola', ['id'=>$id]);
    }

    public function ellimina($id){
        return view('activity.ellimina', ['id'=>$id]);
    }

    public function modifica($id){
        return view('activity.modifica', ['id'=>$id]);
    }
    
    public function nuovo(){
        return view('activity.nuovo');
    }
}
