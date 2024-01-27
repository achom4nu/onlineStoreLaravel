<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //Esta función guarda el idioma elegido en una sesión y retorna una 
    //variable (language_switched) la cuall será usada en el index.blade
    public function languageSwitch(Request $request){

        //Coger el idioma desde el formulario
        $language = $request->input('language');

        //Guardar el idioma en la sesión
        session(['language' => $language]);

        return redirect()->back()->with(['language_switched' => $language]);
    }
}
