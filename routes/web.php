<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function(Request $request) {

    $request->validate([
        'input_number' => 'required|integer|min:1'
    ]);

    $fibonacci_series = [0];
    $input_number = $request->input_number;
    if($input_number > 1) $fibonacci_series[] = 1;

    $the_nth_number = 0;
    
    for($i = 2; $i < $input_number; $i++) {
        $fibonacci_series[] = $fibonacci_series[$i - 1] + $fibonacci_series[$i - 2];
    }
    $the_nth_number = end($fibonacci_series);

    return view('welcome', compact('fibonacci_series', 'the_nth_number', 'input_number'));
});
