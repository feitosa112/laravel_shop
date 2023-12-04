<?php

namespace App\Console\Commands;

use App\Models\CurrencyModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ExchangeRate extends Command
{

    protected $signature = 'exchange:rate';


    protected $description = 'Ispisuje trenutni kurs odrdjenih valuta u odnosu na evro';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        try
        {
            $currency =['BAM','EUR','CHF','AUD','USD','RSD','SEK'];
            $response = Http::get(env('CURRENCY_API_URL').'/latest?',[
                'access_key'=> env('CURRENCY_API_KEY'),
                'base' => 'EUR',
                'symbols' => implode(',',$currency)


            ]);
            if($response->status() ==200){
                $jsonResponse = $response->body();
                $jsonResponse = json_decode($jsonResponse);
                foreach($currency as $cur){
                    $todayCurrency = CurrencyModel::currencyForToday($cur);

                    if($todayCurrency === null){
                        $uperCaseCur = strtoupper($cur);
                        CurrencyModel::create([
                            'currency' => $uperCaseCur ,
                            'value' =>$jsonResponse->rates->$uperCaseCur
                        ]);
                        continue;
                    }else{
                        continue;
                    }


                }
            //   dd($jsonResponse->rates);
            $this->info('Podaci su uspjesno unijeti u bazu');
            }else
            {
                $this->error('Nije moguce dobiti informacije o kursu');
            }
        }
        catch(\Exception $e)
        {
            $this->error('Doslo je do greske'.$e->getMessage());
        }


    }
}
