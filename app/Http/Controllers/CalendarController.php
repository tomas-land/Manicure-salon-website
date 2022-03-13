<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            if ($request->ajax()) {
                $data = Visit::where('created_by', 'admin')->whereDate('start', '>=', $request->start)
                    ->whereDate('end', '<=', $request->end)
                    ->get(['id', 'start', 'end', 'service', 'price', 'name', 'client_id', 'color']);
                return response()->json($data);
            }
            $clients = Client::where('created_by', 'admin')->orderBy('name', 'ASC')->get();
        } elseif (Auth::user() && Auth::user()->role == 'guest') {
            if ($request->ajax()) {
                $data = Visit::where('created_by', 'guest')->whereDate('start', '>=', $request->start)
                    ->whereDate('end', '<=', $request->end)
                    ->get(['id', 'start', 'end', 'service', 'price', 'name', 'client_id', 'color']);
                return response()->json($data);
            }
            $clients = Client::where('created_by', 'guest')->orderBy('name', 'ASC')->get();
        }

        $sub_services = SubService::orderBy('name', 'ASC')->get();
        return view('admin.calendar.index', compact('sub_services', 'clients'));
    }

    public function action(Request $request)
    {

        if ($request->ajax()) {

            if ($request->type === 'add') {

                $event = Visit::create([

                    'name' => $request->name,
                    'client_id' => $request->client_id,
                    'service' => $request->service,
                    'price' => $request->price,
                    'start' => $request->start,
                    'end' => $request->end,
                    'created_by' => $request->role,
                    'color' => $request->color,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Visit::find($request->id)->update([
                    'name' => $request->name,
                    'service' => $request->service,
                    'price' => $request->price,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Visit::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
}
