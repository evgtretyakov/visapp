<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {

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


      return view('chart');
    }
}
