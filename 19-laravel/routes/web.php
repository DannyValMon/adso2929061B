<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Adoption;
use App\Models\Pet;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function() {
    return view('welcome');
});
Route::get('hello', function() {
    return "<h1>Hello, Laravel😊!</h1>";
});
Route::get('sayhello/{name}', function($name) {
    return "<h1>Hello: " . request()->name . "</h1>";
});
Route::get('show/pet/{id}', function() {
    $pets = App\Models\Pet::find(request()->id);
    dd($pets->toArray());
});
Route::get('challenge', function() {
    $users = App\Models\User::take(20)->get();
    $stylesTH = "style='background: gray; color: white; padding: 0.4rem;'";
    $stylesTD = "style='border: 1px solid gray; padding: 0.4rem;'";
    //add 'User' -> 'Users'
    $code = "<table style='border-collapse: collapse; margin: 2rem auto; font-family: Arial; text-align: center;'>";
    foreach($users as $user) {
        $code .= ("<tr style='background: #000000; color: #ffffff; text-align: center;'>");
        $code .= "<td style='padding-right: 10px; padding-left: 10px;'>" . $user->id . "</td>";
        $code .= "<td style='padding-top: 10px; padding-bottom: 10px;'>" . $user->last_name . "</td>";
        $code .= "<td style='padding-top: 10px; padding-bottom: 10px;'>" . $user->first_name . "</td>";
        $code .= "<td style='padding-top: 10px; padding-bottom: 10px;'>" . $user->email . "</td>";
        $code .= "<td style='padding-top: 10px; padding-bottom: 10px;'>" . $user->role . "</td>";
        $code .= "</tr>";
    }
    return $code . "</table>";
});
Route::get('getall/pets', function(){
    $pets = App\Models\Pet::all();
    return view('getallpets')->with('pets', $pets);
});