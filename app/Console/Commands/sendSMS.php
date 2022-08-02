<?php

namespace App\Console\Commands;

use App\Models\Visit;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class sendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:SMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send SMS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $visits = Visit::where('created_by', 'admin')->whereDate('start', Carbon::tomorrow())->where('name', '!=', '_MANO LAISVALAIKIS')->get();

        foreach ($visits as $visit) {
            $visitTimeByPhone[$visit->client->phone][] = Carbon::parse($visit->start)->format("H:i");
        }

        foreach ($visitTimeByPhone as $phone => $time) {

            $uid = getenv('UID_SMSBIURAS');
            $apikey = getenv('API_KEY_SMSBIURAS');
            $to = $phone; // Gavėjo numeris
            $from = "VB-studija"; // Patvirtintas siuntėjo pavadinimas
            $message = urlencode("Sveiki, primename, kad rytoj " . implode(' ir ', $time) . " val. laukiame Jūsų, Virmantės Bašinskienės manikiūro studijoje. Iki malonaus susitikimo! "); // Žinutės tekstas
            $test = 0; // 0 - siunčiama reali SMS, 1 - reali SMS nesiunčiama

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://savitarna.smsbiuras.lt/api?uid=$uid&apikey=$apikey&message=$message&from=$from&to=$to&test=$test",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

        }
        // $visits = Visit::where('created_by', 'admin')->whereDate('start', Carbon::tomorrow())->get();

        // foreach ($visits as $visit) {
        //     $visitTimeByPhone[$visit->client->phone][] = Carbon::parse($visit->start)->format("H:i");
        // }

        // foreach ($visitTimeByPhone as $phone => $time) {

        //     $sms_text = "Sveiki, primename, kad rytoj " . implode(' ir ', $time) . " val. laukiame Jūsų, Virmantės Bašinskienės manikiūro studijoje. Iki malonaus susitikimo! ";
        //     $basic = new \Vonage\Client\Credentials\Basic("50ffa6fe", "pYarAQx6YzJSmBoW");
        //     $client = new \Vonage\Client($basic);
        //     $client->sms()->send(
        //         new \Vonage\SMS\Message\SMS($phone, 'VB-nailart studija', $sms_text)
        //     );

        // }

        // sleep(120);
        // $raportsDownloaded = 0;

        // for ($x = 0; $x < 4; $x++) {
        //     $today = Carbon::today()->format('Y-m-d');
        //     $raportsDownloaded++;
        //     $client = new Client();
        //     $credentials = base64_encode('50ffa6fe:pYarAQx6YzJSmBoW');
        //     $response = $client->get("https://api.nexmo.com/v2/reports/records?account_id=50ffa6fe&product=SMS&direction=outbound&date_start={$today}T01:00:00Z&date_end={$today}T23:00:00Z",
        //         [
        //             'headers' => [
        //                 'Authorization' => 'Basic ' . $credentials,
        //             ],
        //         ]);

        //     if ($response->getStatusCode() == 200) {
        //         $responseBody = json_decode($response->getBody(), true);
        //     }
        //     $records = $responseBody['records'];

        //     foreach ($records as $data) {
        //         if ($data['status'] == 'failed') {
        //             $failedPhoneNumbers[] = $data['to'];
        //         }
        //     }
        //     if (!empty($failedPhoneNumbers)) {
        //         $visits = Visit::with('client')->where('created_by', 'admin')->whereDate('start', Carbon::tomorrow())->get();

        //         foreach ($visits as $visit) {
        //             if (in_array($visit->client->phone, $failedPhoneNumbers)) {
        //                 $v[] = $visit;
        //             }
        //         }
        //         foreach ($v as $visit) {
        //             $visitTimeByPhone[$visit->client->phone][] = Carbon::parse($visit->start)->format("H:i");
        //         }
        //         foreach ($visitTimeByPhone as $phone => $time) {

        //             $sms_text = "Sveiki, primename, kad rytoj " . implode(' ir ', $time) . " val. laukiame Jūsų, Virmantės Bašinskienės manikiūro studijoje. Iki malonaus susitikimo! ";
        //             $basic = new \Vonage\Client\Credentials\Basic("50ffa6fe", "pYarAQx6YzJSmBoW");
        //             $client = new \Vonage\Client($basic);
        //             $client->sms()->send(
        //                 new \Vonage\SMS\Message\SMS($phone, 'VB-nailart studija', $sms_text)
        //             );
        //             sleep(120);
        //         }
        //     } else {
        //         break;
        //     }
        //     if ($raportsDownloaded == 3) {
        //         $sms_text = "Vonage gryba pjauna ";
        //         $basic = new \Vonage\Client\Credentials\Basic("50ffa6fe", "pYarAQx6YzJSmBoW");
        //         $client = new \Vonage\Client($basic);
        //         $client->sms()->send(
        //             new \Vonage\SMS\Message\SMS(+37067532865, 'VB-nailart studija', $sms_text)
        //         );
        //         break;
        //     }
        // }

        // $dates = Visit::where('created_by','admin')->whereDate('start', Carbon::tomorrow())->get();
        // foreach ($dates as $date) {
        //     $hours = $date->start;
        //     $dt = Carbon::createFromFormat("Y-m-d H:i:s", $hours);
        //     $time = $dt->format('H:i');
        //     $sms_text = "Sveiki, primename, kad rytoj, {$time} , laukiame Jūsų Virmantės Bašinskienės manikiūro studijoje. Iki malonaus susitikimo! ";

        //     $basic = new \Vonage\Client\Credentials\Basic("50ffa6fe", "pYarAQx6YzJSmBoW");
        //     $client = new \Vonage\Client($basic);
        //     $client->sms()->send(
        //         new \Vonage\SMS\Message\SMS($date->client->phone, 'VB-nailart studija', $sms_text)
        //     );
        // }

    }

}
