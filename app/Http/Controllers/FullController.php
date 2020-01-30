<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullController extends Controller
{
  public function accueil(){
    return view('accueil');
  }
  public function inscription(){
    return view('inscription');

  }
  public function connexion(){
    return view('connexion');

  }
  public function boutique(){
    return view('boutique');

  }
  public function panier(){
    return view('panier');

  }
  public function mentions_legales(){
    return view('mentions_legales');

  }
  public function cgv(){
    return view('cgv');

  }
  public function aboutique(){
    return view('aboutique');

  }
  public function evenement(){
    return view('evenement');

  }
  public function aevenement(){
    return view('aevenement');
  }

  public function sendData(){
    return view('send-data');

  }
}