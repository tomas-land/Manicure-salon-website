<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user() && Auth::user()->role == 'admin') {

            $visits = Visit::where('created_by', 'admin')->orderBy('start', 'DESC')->paginate(6);
        } else {
            $visits = Visit::where('created_by', 'guest')->orderBy('start', 'DESC')->paginate(6);

        }

        return view('admin.visits.index', compact('visits'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {

            $clients = Client::where('created_by', 'admin')->get();
        } else {
            $clients = Client::where('created_by', 'guest')->get();

        }
      
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
        $visit->created_by = $request->input('created_by');
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
