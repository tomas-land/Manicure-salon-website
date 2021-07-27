<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $manicure_services = SubService::where('service_id', 1)->get();
       $manicure2_services = SubService::where('service_id', 2)->get();
       $pedicure_services = SubService::where('service_id', 3)->get();
       $piling_services = SubService::where('service_id', 4)->get();
       $eyebrow_services = SubService::where('service_id', 5)->get();
       $depilation_services = SubService::where('service_id', 6)->get();
       
       return view('paslaugos.index',[
           'manicure_services'=>$manicure_services,
           'manicure2_services'=>$manicure2_services,
           'pedicure_services'=>$pedicure_services,
           'piling_services'=>$piling_services,
           'eyebrow_services'=>$eyebrow_services,
           'depilation_services'=>$depilation_services
        
        
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('paslaugos.create',['services'=>$services]);
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
        $author = new SubService();
        $author->fill($request->all());
   
    return ($author->save() !== 1) ?
    redirect()->route('paslaugos.index')->with('status_success', "Pridėta!") :
    redirect()->route('paslaugos.index')->with('status_error', "Klaida!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
    
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $service = SubService::find($id);
        return view('paslaugos.edit', [
            'service' => $service

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubService  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service =  SubService::where('id', '=', $id)->first();
        $service->name = $request -> name;
        
         $service->save();
 //    
 return redirect()->route('paslaugos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $child = DB::table('manicure_services')->where('id', $service->id)->first();
        $service = SubService::where('id',$id);
        $service->delete();
        //  $service->manicureServices()->where('id',1)->delete();
        return redirect()->route('paslaugos.index');
    }
}
