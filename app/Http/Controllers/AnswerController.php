<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:manager')->only('index');
    }
    public function create(Application $application)
    {
        if (! Gate::allows('update-post', auth()->user())) {
            // abort(403);
            return view('applications.error');
        }
        return view('answers.create', ['application' => $application]);
    }
    public function store(Application $application, Request $request)
    {
        if (! Gate::allows('update-post', auth()->user())) {
            // abort(403);
            return view('applications.error');
        }
        $request->validate([
            'body' => 'required'
        ]);
        $application->answer()->create([
            'body' => $request->body,
        ]);
        return redirect()->route('dashboard');
    }
}
