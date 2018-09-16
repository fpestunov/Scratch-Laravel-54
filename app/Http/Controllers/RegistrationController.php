<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    
    public function create()
    {
        return view('registration.create');
    }
    
    public function store(RegistrationForm $form)
    {
        // Validate the form
        // Move to \App\Http\Request

        // Create and save the user.
        // Sign them in.
        // Send welcome email
        // Move to \App\Http\Request->persist()
        $form->persist();

        session()->flash('message', 'Thanks for sign up!');

        // Redirect to the home page.
        return redirect()->home(); // =redirect('/')
    }
}
