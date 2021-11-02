<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $visits = Visit::orderBy('start', 'DESC')->paginate(6);
        return view('admin.visits.index', compact('visits'));

// get all numbers which visit start today

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $sub_services = SubService::all();
        return view('admin.visits.create', compact('sub_services', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:authors|max:50',
        //     'surname' => 'required|unique:authors|max:50',

        // ]);
        $client_id = explode("-", $request->input('client_id'));
// dd($request);
        $visit = new Visit();
        $visit->client_id = $client_id[0];
        $visit->name = $client_id[1];
        $visit->start = $request->input('start');
        $visit->end = $request->input('end');
        $visit->service = $request->input('service');
        $visit->price = $request->input('price');
        $visit->save();

        // $visit = new Visit();
        // $visit->fill($request->all());

        return ($visit->save() !== 1) ?
        redirect()->route('visits.index')->with('status_success', "Pridėta!") :
        redirect()->route('visits.index')->with('status_error', "Klaida!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        $sub_services = SubService::all();
        return view('admin.visits.edit', compact('sub_services', 'visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        $visit->update($request->all());

        return redirect()->route('visits.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();

        return redirect()->route('visits.index')
            ->with('success', 'Deleted successfully');
    }
}
