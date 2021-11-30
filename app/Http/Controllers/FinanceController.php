<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

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

   
//send date and use $request->date 

    $startDate1 = '2021-12-01';
    $endDate1 = '2021-12-31';
    $gruodis = Visit::
        whereBetween('start', [$startDate1, $endDate1])
        ->pluck('price', 'start');

        $gruodisTotal = 0;
        foreach($gruodis as $key=>$value){
            $gruodisTotal+=$value;
        }

    $startDate2 = '2022-01-01';
    $endDate2 = '2022-01-31';
    $gruodis = Visit::
        whereBetween('start', [$startDate2, $endDate2])
        ->pluck('price', 'start');

        $sausisTotal = 0;
        foreach($gruodis as $key=>$value){
            $sausisTotal+=$value;
        }
  
   
    return view('admin.finance.index', compact('gruodisTotal','sausisTotal'));

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
