<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function result($number1, $operator, $number2,)
    {
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
                $result = '';
        }
        return view('message.calcs', [
            'number1' => $number1,
            'operator' => $operator,
            'number2' => $number2,
            'result' => $result
        ]);
    }
}
