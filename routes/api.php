<?php
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\ReponseAnnounceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Register and login
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);

//Entreprise without token
Route::get("/enterprises", [EnterpriseController::class, "index"]);
Route::get("/enterprises/{id}", [EnterpriseController::class, "show"]);
Route::get("/enterprises/search/{name}", [EnterpriseController::class, "search"]);
//enterprise with token
Route::put("/enterprises/{id}", [EnterpriseController::class, "update"]);
Route::post("/enterprises", [EnterpriseController::class, "store"]);
Route::delete("/enterprises/{id}", [EnterpriseController::class, "destroy"]);

//Utilisateur without token
Route::get("/utilisateurs", [UtilisateurController::class, "index"]);
Route::get("/utilisateurs/{id}", [UtilisateurController::class, "show"]);
Route::get("/utilisateurs/searcNom/{name}", [UtilisateurController::class, "searchNom"]);
Route::get("/utilisateurs/searchPrenom/{name}", [UtilisateurController::class, "searchPrenom"]);
//utilisateur with token
Route::put("/utilisateurs/{id}", [UtilisateurController::class, "update"]);
Route::post("/utilisateurs", [UtilisateurController::class, "store"]);
Route::delete("/utilisateurs/{id}", [UtilisateurController::class, "destroy"]);

//Announce without token
Route::get("/announces", [AnnounceController::class, "index"]);
Route::get("/announces/{id}", [AnnounceController::class, "show"]);
Route::get("/announces/search/{name}", [AnnounceController::class, "search"]);
//announces with token
Route::put("/announces/{id}", [AnnounceController::class, "update"]);
Route::post("/announces", [AnnounceController::class, "store"]);
Route::delete("/announces/{id}", [AnnounceController::class, "destroy"]);

//Announce without token
Route::get("/reponseanounce", [ReponseAnnounceController::class, "index"]);
Route::get("/reponseanounce/{id}", [ReponseAnnounceController::class, "show"]);
Route::get("/reponseanounce/search/{name}", [ReponseAnnounceController::class, "search"]);
//announces with token
Route::put("/reponseanounce/{id}", [ReponseAnnounceController::class, "update"]);
Route::post("/reponseanounce", [ReponseAnnounceController::class, "store"]);
Route::delete("/reponseanounce/{id}", [ReponseAnnounceController::class, "destroy"]);

//Token
Route::group(["middleware" => "auth:sanctum"], function () {
    
    
    
    //logout
    Route::post("/logout", [UserController::class, "logout"]);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
