<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
   
   public function index() {

   		$tasks = [
   			'Goto the store',
   			'Go for namaz',
   			'Study Database',
   			'Create something in laravel'
   		];

   		return view('students.index', compact('tasks'));
   }

}
