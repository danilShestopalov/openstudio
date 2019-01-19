<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function getJson() {
        return [
            array(
                'title' => 'Google',
                'url' => 'https://www.google.com/search?q=composer+create-project&oq=composer+cre&aqs=chrome.0.0j69i57j69i59j0l3.5840j0j7&sourceid=chrome&ie=UTF-8',
            ),
            array(
                'title' => 'Google',
                'url' => 'https://www.google.com/search?q=composer+create-project&oq=composer+cre&aqs=chrome.0.0j69i57j69i59j0l3.5840j0j7&sourceid=chrome&ie=UTF-8',
            )
        ];
    }
    public function chartData()
    {
        return [
            'labels' => ['март', 'аперль', 'май', 'июнь'],
            'datasets' => array([
                'label'=> 'Продажи',
                'backgroundColor' => '#F26202',
                'data' => [15000,5000,10000,30000],
            ])
        ];
    }

}
