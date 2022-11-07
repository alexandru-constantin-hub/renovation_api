<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Enterprise;
use Auth;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Enterprise::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $enterprise_data = [
            'nom' => $request->input('nom'),
            'code'=> $request->input('code'),
            'adresse'=> $request->input('adresse'),
            'ville'=> $request->input('ville'),
            'region'=> $request->input('region'),
            'telephone'=> $request->input('telephone'),
            'email'=> $request->input('email'),
            'website'=> $request->input('website'),
            'logo'=> $request->input('logo'),
            'description'=> $request->input('description'),
            'user_id'=> $request->input('user_id'),
        ];
        
        return Enterprise::create($enterprise_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Enterprise::findOrFail($id);
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
        $enterprise = Enterprise::findOrFail($id);
        $enterprise->update($request->all());
        return $enterprise;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Enterprise::destroy($id);
    }


   /**
   *Search for enterprise by name
   */ 

   public function search($name) {
    return Enterprise::where('nom', 'like', '%' . $name . '%')->get();
   }
}
