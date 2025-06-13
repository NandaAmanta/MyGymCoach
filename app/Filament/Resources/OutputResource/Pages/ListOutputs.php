<?php

namespace App\Filament\Resources\OutputResource\Pages;

use App\Filament\Resources\OutputResource;
use App\Models\Option;
use App\Models\Output;
use App\Models\Question;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;

class ListOutputs extends ListRecords
{
    protected static string $resource = OutputResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('Generate Output')->action(function () {
                $combinations = $this->getAllAnswerCombinations();
                foreach ($combinations as $key => $combination) {
                    $output = new Output();
                    $output->name = 'Output #' . ($key + 1);
                    $output->save();
                    $output->options()->sync($combination);
                }
            }),
        ];
    }

    function getAllAnswerCombinations()
    {
        $questions = Question::with('options')->orderBy('order')->get();
        $optionsPerQuestion = $questions->map(function ($question) {
            return $question->options->pluck('id')->toArray();
        })->toArray();
        return $this->cartesianProduct($optionsPerQuestion);
    }

    function cartesianProduct($arrays)
    {
        if (empty($arrays)) return [[]];
        $result = [];
        $first = array_shift($arrays);
        $restProduct = $this->cartesianProduct($arrays);
        foreach ($first as $value) {
            foreach ($restProduct as $product) {
                $result[] = array_merge([$value], $product);
            }
        }
        return $result;
    }
}
