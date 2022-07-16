<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Ifsnop\Mysqldump as IMysqldump;

// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        function assignPricesToDate($visits)
        {
            $array = [];
            foreach ($visits as $date => $price) {
                $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d'); // date format change
                $array[$newDate][] = $price; // adding prices to array to corresponding date
            }
            return $array;
        }

        function sumPricesAssignToDate($array)
        {
            $visits = [];
            foreach ($array as $k => $v) { // looping through array with dates  and suming prices to corresponding date
                $visits[$k] = array_sum($v);
            }
            return $visits;
        }

        function countTotal($visits)
        {
            $visitsIncomeTotal = 0;
            foreach ($visits as $date => $price) {
                $visitsIncomeTotal += $price;
            }
            return $visitsIncomeTotal;
        }

        //------------------------------------------------------------------------------------------------------------------
        $now = Carbon::now();
        $today = Carbon::today();
        $days30back = Carbon::today()->subDays(12); // 31 days back from today
        $beginingOfCurrentMonth = Carbon::now('Europe/Vilnius')->startOfMonth();
        $endingOfCurrentMonth = Carbon::now('Europe/Vilnius')->endOfMonth();
        $monthBeforeBegining = Carbon::now()->subMonth('1')->startOfMonth();
        $monthBeforeEnding = Carbon::now()->subMonth('1')->endOfMonth();
        $twoMonthsBeforeBegining = Carbon::now()->subMonth('2')->startOfMonth();
        $twoMonthsBeforeEnding = Carbon::now()->subMonth('2')->endOfMonth();

        // $visits1 = Visit::where('start', $today)->pluck('price', 'start')->first(); // null
        // $visits2 = Visit::whereDate('start', '<=', Carbon::now())->pluck('price', 'start'); // array{"2021-11-23 19:37:00" => 146} takes visits from now to past time
        // $visits3 = Visit::select(DB::raw('start')) // returns array of objects with time
        //     ->whereDate('start', '<=', Carbon::now())
        //     ->get();
        //------------------------------------------------------------------------------------------------------------------

        if (Auth::user() && Auth::user()->role == 'admin') {

            $services = Visit::where('created_by', 'admin')->whereBetween('start', [$beginingOfCurrentMonth, $endingOfCurrentMonth])
                ->pluck('service', 'id');
        } else {
            $services = Visit::where('created_by', 'guest')->whereBetween('start', [$beginingOfCurrentMonth, $endingOfCurrentMonth])
                ->pluck('service', 'id');

        }

        $array = [];
        foreach ($services as $id => $service) {
            $array[$service][] = $id;
        }

        $services = [];
        foreach ($array as $service => $id) {
            $services[$service] = count($id);
        }
        // dd($services);

        return view('admin.statistics.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
