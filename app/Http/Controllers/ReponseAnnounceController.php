<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReponseAnnounce;
use Auth;

class ReponseAnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReponseAnnounce::where('user_id', Auth::user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announce_data = [
            'id_announce' => $request->input('id_announce'),
            'message'=> $request->input('message'),
            'budgetproposer'=> $request->input('budgetproposer'),
            'user_id'=> $request->input('user_id'),
        ];
        
        return ReponseAnnounce::create($announce_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ReponseAnnounce::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reponseannounce = ReponseAnnounce::findOrFail($id);
        $reponseannounce->update($request->all());
        return $reponseannounce;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ReponseAnnounce::destroy($id);
    }
}
