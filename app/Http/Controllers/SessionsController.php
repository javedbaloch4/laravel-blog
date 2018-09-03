<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionsForm;

class SessionsController extends Controller
{
    public function index() {
        return view('sessions.index');
    }

    public function store (SessionsForm $form) {

        $form->persists();

        session()->flash(
            'message' , 'Sign In successfully'
        );

        return redirect('/posts/create');

    }

    public function logout() {
        auth()->logout();

        session()->flash(
            'message' , 'Logout successfully'
        );

        return redirect('/');
    }
}
