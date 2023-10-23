<?php

use App\Http\Controllers\CalcController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view/calcs/{number1}/{operator}/{number2}', function ($number1, $operator, $number2,) {
    $result = 0;
    switch ($operator) {
        case 'addition':
            $result = $number1 + $number2;
            break;
        case 'subtraction':
            $result = $number1 - $number2;
            break;
        case 'multiplication':
            $result = $number1 * $number2;
            break;
        case 'division':
            if ($number2 != 0) {
                $result = $number1 / $number2;
            } else {
                $result = '計算できません';
            }
            break;
        default:
            $result = '計算できません';
    }

    return view('message.calcs', [
        'number1' => $number1,
        'operator' => $operator,
        'number2' => $number2,
        'result' => $result
    ]);
});
Route::get('/calcs/{number1}/{operator}/{number2}', [CalcController::class, 'result']);
