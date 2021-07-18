<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ListController extends Controller
{
    public function getList() { 

        return view('list'); 
       } 


       public function index()
       {
           $contacts = Contact::all();
   
           return view('list')->with(['contacts' => $contacts]);
       }
   
}
