<?php

namespace App\Http\Controllers;

class WebController extends Controller
{
    
    public function index()
    {
        return view('landing');
    }

    public function app()
    {
        $questions = \App\Models\Question::query()->with('options')->orderBy('order')->get();
        return view('index', compact('questions'));
    }
    public function output()
    {
        $optionIds = explode(',',request()->get('options'));
        $output = \App\Models\Output::whereHas('options', function ($query) use ($optionIds) {
            $query->whereIn('options.id', $optionIds);
        })->first();
        dd($output);
        return view('output', compact('output'));
    }
}
