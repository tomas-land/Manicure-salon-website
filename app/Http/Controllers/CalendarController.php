<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Visit::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'name', 'surname', 'start', 'end', 'service', 'price']);
            return response()->json($data);
        }
        $sub_services = SubService::all();
        return view('admin.calendar.index', compact('sub_services'));
    }

    public function action(Request $request)
    {
 
        if ($request->ajax()) {
           
            if ($request->type === 'add') {
                $event = Visit::create([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'service' => $request->service,
                    'price' => $request->price,
                    'start' => $request->start,
                    'end' => $request->end
                ]);

                return response()->json($event);
            }

            // if ($request->type == 'update') {
            //     $event = Visit::find($request->id)->update([
            //         'title' => $request->title,
            //         'start' => $request->start,
            //         'end' => $request->end,
            //     ]);

            //     return response()->json($event);
            // }

            if ($request->type == 'delete') {
                $event = Visit::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
}
