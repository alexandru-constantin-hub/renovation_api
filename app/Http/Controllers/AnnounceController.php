<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announce;
use Auth;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Announce::all();
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
            'piece' => $request->input('piece'),
            'description'=> $request->input('description'),
            'budget'=> $request->input('budget'),
            'Y-m-d'=> $request->input('Y-m-d'),
            'user_id'=> $request->input('user_id'),
        ];
        
        return Announce::create($announce_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Announce::findOrFail($id);
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
        $announce = Announce::findOrFail($id);
        $announce->update($request->all());
        return $Announce;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Announce::destroy($id);
    }

    public function search($piece) {
        return Announce::where('piece', 'like', '%' . $piece . '%')->get();
    }
}
