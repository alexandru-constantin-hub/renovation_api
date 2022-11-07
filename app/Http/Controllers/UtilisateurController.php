<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Auth;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Utilisateur::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utilisateur_data = [
            'nom' => $request->input('nom'),
            'prenom'=> $request->input('prenom'),
            'adresse'=> $request->input('adresse'),
            'ville'=> $request->input('ville'),
            'region'=> $request->input('region'),
            'telephone'=> $request->input('telephone'),
            'email'=> $request->input('email'),
            'user_id'=> $request->input('user_id'),
        ];
        
        return Utilisateur::create($utilisateur_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Utilisateur::findOrFail($id);
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
        $enterprise = Utilisateur::findOrFail($id);
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
        return Utilisateur::destroy($id);
    }


   /**
   *Search for enterprise by name
   */ 

   public function searchNom($nom) {
    return Utilisateur::where('nom', 'like', '%' . $nom . '%')->get();
   }

   public function searchPrenom($prenom) {
    return Utilisateur::where('prenom', 'like', '%' . $prenom . '%')->get();
   }
}
