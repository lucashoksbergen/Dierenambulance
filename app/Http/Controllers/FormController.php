<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        // No rules because temp form
        $validated = $request->validate([
            'type' => 'required|in:dog,cat,bird,other',
            'otherkind' => 'nullable|string',
            'breed' => 'required|string',
            'color' => 'required|string',
            'gender' => 'required|in:male,female,ex-male,unknown',
            'condition' => 'required|in:injured,sick,stray,young,weakened,dead,other',
            'chipnumber' => 'required|string',
            'registered' => 'required|boolean',
        ]);

        Form::create($validated);

        return redirect('/form')->with('success', 'Data saved successfully.');
    }
}
