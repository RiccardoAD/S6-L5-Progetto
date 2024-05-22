<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $activities = Activity::all(); // mi mostra tutte le attività che ho sul database
        $searchTerm=$request->input('searchTerm');

        if($searchTerm){
            $activities = Activity::where('title', 'LIKE', '%' . $searchTerm . '%')->paginate(8);
        } else {
            $activities = Activity::paginate(8);
        }

        // $searchTerm= Activity::where('title', 'LIKE', "%searchTerm%")->get(); // con questa seleziono il testo nella bar di ricerca
        // $activities = Activity::paginate(8); //questo mi permette di visualizzare 8 elemanti per pag.
        
        return view('activities.index',
        ["activities"=>$activities]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date= $request->all();

        $newActivity= new Activity();
        $newActivity->title=$date["title"];
        $newActivity->price=$date["price"];
   
        $newActivity->img=$date["img"];
        $newActivity->user_id=$request->user()->id;
        $newActivity->save();

        
        return  redirect()->route("activities.index")->with('create_successer', $newActivity);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {

        return view('activities.show', ['activity'=>$activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Activity $activity)
    {
        if($request->user()->id !== $activity->user_id) abort(401);
        return view('activities.edit', ['activity'=>$activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        // $date= $request->all();

        // $newActivity= new Activity();
        // $newActivity->title=$date["title"];
        // $newActivity->price=$date["price"];
        // $newActivity->productor=$date["productor"];
        // $newActivity->img=$date["img"];
        // $newActivity->update();

         // Validazione dei dati in arrivo
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
      
        'img' => 'nullable|string|max:255',
    ]);

    if($request->user()->id !== $activity->user_id) abort(401);

    // Aggiornamento dell'istanza esistente di Activity
    $activity->title = $validatedData['title'];
    $activity->price = $validatedData['price'];

    $activity->img = $validatedData['img'];
    $activity->update();

        
        return  redirect()->route("activities.show", ['activity'=> $activity])->with('update_successer', $activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Activity $activity)
    {
       
        if($request->user()->id !== $activity->user_id) abort(401);
        $activity->delete();

        return  redirect()->route("activities.index")->with('delete_successer', $activity);
    }
}
