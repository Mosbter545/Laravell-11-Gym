<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GYMCONTROLLER extends Controller
{
    public function inicio() {
        return view('inicio');
    }

    public function servicios() {
        return view('layouts.servicios');
    }

    public function planes() {
        return view('layouts.planes');
    }

    public function horarios() {
        return view('layouts.horarios');
    }

    public function entrenadores() {
        return view('layouts.entrenadores');
    }

    public function contacto() {
        return view('layouts.contacto');
    }
        public function test() {
        return view('layouts.TEST');
    }
}

