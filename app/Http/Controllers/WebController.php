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
        $encodedOptions = base64_decode(request()->get('o'));
        $optionIds = json_decode($encodedOptions);
        $output = \App\Models\Output::query()
        ->with(['schedule']);

        foreach ($optionIds as $optionId) {
            $output = $output->whereHas('options', function ($query) use ($optionId) {
                $query->where('options.id', $optionId);
            });
        }
        $output = $output->first();
        return view('output', compact('output'));
    }
}
