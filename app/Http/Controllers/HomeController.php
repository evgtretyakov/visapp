<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      // Добавляем простой график
            $reasons = \Lava::DataTable();

            $reasons->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow(array('Check Reviews', 5))
                    ->addRow(array('Watch Trailers', 2))
                    ->addRow(array('See Actors Other Work', 4))
                    ->addRow(array('Settle Argument', 89));


            $donutchart = \Lava::DonutChart('IMDB', $reasons, [
                            'title' => 'Reasons I visit IMDB'
                        ]);


        return view('my-chart');
    }
}
