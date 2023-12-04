<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\DecisionTree;
use Phpml\Regression\LeastSquares;
use Phpml\Dataset\CsvDataset;
use Phpml\Metric\Accuracy;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function process(Request $request)
    {
        $request->validate([
            'dataset' => 'required|mimes:csv,txt',
            'kriteria' => 'required|in:naive_bayes,decision_tree,regression',
        ]);
    
        
        $algorithm = $request->input('kriteria');
        
        // Get the file from the request
        $file = $request->file('dataset');
    
        // Move the file to the storage directory
        $file->storeAs('app', 'dataP.csv');
        // Load data from CSV
        $dataset = new CsvDataset(storage_path('app/dataP.csv'), 1, true, ';');

        // Split data into features (X) and labels (y)
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();

        // Split data into training and testing sets
        [$samplesTrain, $samplesTest, $labelsTrain, $labelsTest] = $this->splitData($samples, $labels, 0.2);

        switch ($algorithm) {
            case 'naive_bayes':
                $classifier = new NaiveBayes();
                break;
            case 'decision_tree':
                $classifier = new DecisionTree();
                break;
            case 'regression':
                $classifier = new LeastSquares();
                break;
            default:
                // Handle unknown algorithm (if needed)
                break;
        }
        // Train the model
        $classifier->train($samplesTrain, $labelsTrain);

        // Make predictions on the test set
        $predictions = $classifier->predict($samplesTest);
        switch ($algorithm) {
            case 'naive_bayes':
                // Calculate accuracy for Naive Bayes
                $accuracy = Accuracy::score($labelsTest, $predictions);
                echo "Accuracy (Naive Bayes): " . ($accuracy * 100) . "%";
                break;
            case 'decision_tree':
                $accuracy = Accuracy::score($labelsTest, $predictions);
                echo "Accuracy (Decision Tree): " . ($accuracy * 100) . "%";
                break;
            case 'regression':
                $accuracy = Accuracy::score($labelsTest, $predictions);
                echo "Accuracy (Regression): " . ($accuracy * 100) . "%";
                break;
            default:
                // Handle unknown algorithm (if needed)
                break;
        }

    }

    private function splitData($samples, $labels, $testSize)
    {
        return array_merge(
            array_chunk($samples, (int)(count($samples) * (1 - $testSize))),
            array_chunk($labels, (int)(count($labels) * (1 - $testSize)))
        );
    }
}
