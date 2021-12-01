<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyIncomeChart;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $services = SubService::all()->toArray();
        // $randomService=Arr::random($services);
        // $visits = Visit::
        //         $lapkritis = Visit::whereDate('start','Y-m-d')->get();
        // dd($lapkritis);
        // $months = Visit::orderBy('start','DESC')->where('start',Carbon->distinct()->pluck('price','start')->;
        // $date = '2021-11-23 19:37:00';
        // $months=Carbon::createFromFormat('Y-m-d H:i:s', $request->start)->format('Y-m-d');
        // dd($months);
        // $gruodis= Visit::where('start','2021-11')->pluck('start','price');
        // dd($gruodis);

        // $currentMonth = Visit::select('start')->whereMonth('start',Carbon::now()->month)
        // ->whereYear('start', Carbon::now()->year)
        // ->sum("price");

// dd($currentMonth);

//send date and use $request->date /fetch by month

        // count total sum of specific month
        function countTotal($month)
        {
            $monthTotal = 0;
            foreach ($month as $key => $value) {
                $monthTotal += $value;
            }
            return $month = $monthTotal;
        }
        //--------------------------------------december
        $startDate1 = '2021-12-01';
        $endDate1 = '2021-12-31';
        $gruodis = Visit::
            whereBetween('start', [$startDate1, $endDate1])
            ->pluck('price', 'start');

        $gruodisTotal = countTotal($gruodis);
        //--------------------------------------january
        $startDate2 = '2022-01-01';
        $endDate2 = '2022-01-31';
        $sausis = Visit::
            whereBetween('start', [$startDate2, $endDate2])
            ->pluck('price', 'start');
        $sausisTotal = countTotal($sausis);
        //------------------------------------------------------------------------------------------------------------------
        $today = Carbon::today();
        $days30back = Carbon::today()->subDays(12); // 31 days back from today
        $beginingOfMonth = Carbon::today('Europe/Vilnius')->startOfMonth();
        $endingOfMonth = Carbon::today('Europe/Vilnius')->endOfMonth();
        $visits1 = Visit::where('start', $today)->pluck('price', 'start')->first(); // null
        $visits2 = Visit::whereDate('start', '<=', Carbon::now())->pluck('price', 'start'); // array{"2021-11-23 19:37:00" => 146} takes visits from now to past time
        $visits3 = Visit::select(DB::raw('start')) // returns array of objects with time
            ->whereDate('start', '<=', Carbon::now())
            ->get();
        //------------------------------------------------------------------------------------------------------------------
        $visitsOfcurrentMonth = Visit::whereBetween('start', [$beginingOfMonth, $endingOfMonth])
            ->pluck('price', 'start');

        foreach ($visitsOfcurrentMonth as $date => $price) {
            $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d'); // date format change
            $array[$newDate][] = $price; // adding prices to array to corresponding date
        }
        foreach ($array as $k => $v) { // looping through array with dates  and suming prices to corresponding date
            $array2[$k] = array_sum($v);
        }

        $chart = new MonthlyIncomeChart;
        $chart->labels(array_keys($array2));
        // $chart->height(600);
        // $chart->minimalist(true);
        // $chart->title('diagrama',30 ..);
        $chart->displaylegend(false);
        $chart->dataset('My dataset', 'bar', array_values($array2))
            // ->fontcolor("red")
            // ->backgroundcolor("rgb(200, 99, 132)")
            ->fill(true);
            // ->linetension(0.5)
            // ->dashed([10]);

// $chart->barWidth(9.99);
        // 
        // // $chart->minimalist(true);
        // $chart->displayAxes(true);

        return view('admin.finance.index', compact('gruodisTotal', 'sausisTotal', 'chart','array2'));

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
