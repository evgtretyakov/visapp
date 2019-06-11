<?


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ChartController extends Controller
{

public function getPie()
{
    $lava = new Lavacharts;

    $reasons = $lava->DataTable();

    $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(array('Check Reviews', 5))
            ->addRow(array('Watch Trailers', 2))
            ->addRow(array('See Actors Other Work', 4))
            ->addRow(array('Settle Argument', 89));


    $donutchart = $lava->DonutChart('IMDB', $reasons, [
                    'title' => 'Reasons I visit IMDB'
                ]);


    return view('chart', [
              'lava'      => $lava
          ]);
}


}
