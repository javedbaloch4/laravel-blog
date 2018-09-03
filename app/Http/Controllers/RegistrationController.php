<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{

    public function __construct() {
        $this->middleware('guest');
    }

    public function create() {
        return view('registration.create');
    }

    public function store(RegistrationForm $request) {

        $request->persists();

        session()->flash(
            'message' , 'Thanks you for signing up!'
        );

        return redirect('/posts/create');

    }
}
