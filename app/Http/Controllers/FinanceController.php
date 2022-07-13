<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $endingOfMonth = Carbon::today('Europe/Vilnius')->endOfMonth();
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
            $visitsOfcurrentMonth = Visit::where('created_by', 'admin')->whereBetween('start', [$beginingOfCurrentMonth, $now])
                ->pluck('price', 'start');
            $assignedPrices = assignPricesToDate($visitsOfcurrentMonth);
            $summedUpPrices = sumPricesAssignToDate($assignedPrices);
            $currentMonthTotal = countTotal($summedUpPrices);

            $visitsOfMonthBefore = Visit::where('created_by', 'admin')->whereBetween('start', [$monthBeforeBegining, $monthBeforeEnding])
                ->pluck('price', 'start');
            $assignedPrices2 = assignPricesToDate($visitsOfMonthBefore);
            $summedUpPrices2 = sumPricesAssignToDate($assignedPrices2);
            $monthBeforeTotal = countTotal($summedUpPrices2);

            $visitsOfTwoMonthsBefore = Visit::where('created_by', 'admin')->whereBetween('start', [$twoMonthsBeforeBegining, $twoMonthsBeforeEnding])
                ->pluck('price', 'start');
            $assignedPrices3 = assignPricesToDate($visitsOfTwoMonthsBefore);
            $summedUpPrices3 = sumPricesAssignToDate($assignedPrices3);
            $twoMonthsBeforeTotal = countTotal($summedUpPrices3);
        } else {
            $visitsOfcurrentMonth = Visit::where('created_by', 'guest')->whereBetween('start', [$beginingOfCurrentMonth, $now])
                ->pluck('price', 'start');
            $assignedPrices = assignPricesToDate($visitsOfcurrentMonth);
            $summedUpPrices = sumPricesAssignToDate($assignedPrices);
            $currentMonthTotal = countTotal($summedUpPrices);

            $visitsOfMonthBefore = Visit::where('created_by', 'guest')->whereBetween('start', [$monthBeforeBegining, $monthBeforeEnding])
                ->pluck('price', 'start');
            $assignedPrices2 = assignPricesToDate($visitsOfMonthBefore);
            $summedUpPrices2 = sumPricesAssignToDate($assignedPrices2);
            $monthBeforeTotal = countTotal($summedUpPrices2);

            $visitsOfTwoMonthsBefore = Visit::where('created_by', 'guest')->whereBetween('start', [$twoMonthsBeforeBegining, $twoMonthsBeforeEnding])
                ->pluck('price', 'start');
            $assignedPrices3 = assignPricesToDate($visitsOfTwoMonthsBefore);
            $summedUpPrices3 = sumPricesAssignToDate($assignedPrices3);
            $twoMonthsBeforeTotal = countTotal($summedUpPrices3);
        }
        Carbon::setLocale('LT'); // change language for carbon dates
        return view('admin.finance.index', compact('summedUpPrices', 'currentMonthTotal', 'monthBeforeTotal', 'twoMonthsBeforeTotal'));

        //  Laravel Charts -----------------------------------------------------------------------------------------------------------
        // $chart = new MonthlyIncomeChart;
        // $chart->labels(array_keys($array2));
        // $chart->height(600);
        // $chart->minimalist(true);
        // $chart->title('diagrama',30 ..);
        // $chart->displaylegend(false);
        // $chart->dataset('My dataset', 'bar', array_values($array2))
        // ->fontcolor("red")
        // ->backgroundcolor("rgb(200, 99, 132)")
        // ->fill(true);
        // ->linetension(0.5)
        // ->dashed([10]);
        // $chart->barWidth(9.99);
        //
        // // $chart->minimalist(true);
        // $chart->displayAxes(true);

    }

}
