<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\SubService;
use App\Models\Visit;
use App\Models\Client;
use DateTime;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Visit::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'start', 'end', 'service', 'price','name','client_id']);
            return response()->json($data);
        }
        $sub_services = SubService::all();
        $clients= Client::all();
        return view('admin.calendar.index', compact('sub_services','clients'));
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
                ]);
            
                // dd($request);
                // $basic = new \Vonage\Client\Credentials\Basic("50ffa6fe", "pYarAQx6YzJSmBoW");
                // $client = new \Vonage\Client($basic);
                // $number=37067532865;
                // $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($number, 'VB-nailart studija', 'Laukiame jusu rytoj')
                // );

                // $message = $response->current();

                return response()->json($event);

                // if ($message->getStatus() == 0) {
                //     echo "The message was sent successfully\n";
                // } else {
                //     echo "The message failed with status: " . $message->getStatus() . "\n";
                // }
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
