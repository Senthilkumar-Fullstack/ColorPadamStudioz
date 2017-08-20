<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Response;

use Illuminate\Http\Request;
use Mail;

/**
* 
*/
class EmailController extends Controller
{
	
	public function send(Request $request)
    {
    	$jsondata = $request->json()->all(); //get json data from api
		if (empty($jsondata)) {  //check if json data is empty
		    return Response()->json(['error' => 'Your Input Data is empty', 'code'=>422], 422);
		}

        if($jsondata['tripType'] == 'roundTrip') {
        	$jsondata['tripType'] = 'Round Trip';
        }else {
        	$jsondata['tripType'] = 'One Way';
            $jsondata['return'] = '';
        }

        $jsondata['mailHeading'] = 'Airtickets Quote Request';

        $sent = Mail::send('testmail', $jsondata, function ($message)
        {

            $message->from('senthil.noahdata@gmail.com', 'Desiflight');

            $message->to('senthil.noahdata@gmail.com');

            $message->subject('Desiflight - Get Quote');

        });

        return Response()->json(['success' =>'Successfully sent mail'] ,200);
    }


    /**
     * Send Mail for Tour Quote
     */
    public function sendTourQuote(Request $request)
    {
        try {
            $jsondata = $request->json()->all(); //get json data from api
            if (empty($jsondata)) {  //check if json data is empty
                return Response()->json(['error' => 'Your Input Data is empty', 'code'=>422], 422);
            }

            Log::info('Mail-->'.$jsondata['email']);

            if($jsondata['needAirTicket'] == '1') {
                $jsondata['needAirTicket'] = 'Yes';
            }else {
                $jsondata['needAirTicket'] = 'No';
            }

            $jsondata['mailHeading'] = 'Tour Package Quote Request';

            $sent = Mail::send('tourquotemail', $jsondata, function ($message)
            {

                $message->from('senthil.noahdata@gmail.com', 'Desiflight');

                $message->to('senthil.noahdata@gmail.com');

                $message->subject('Desiflight - Get Quote - Tours');

            });

            return Response()->json(['success' =>'Successfully sent mail'] ,200);
        } catch (\Exception $e) {
            return Response()->json(['fail' =>'Failed to send mail', 'error' => $e], 500);
        }
        
    }

    public function mail() {
    	Mail::send('testmail', ['name' => 'senthil'], function($message){
    		$message->to('senthil.noahdata@gmail.com', 'Senthil')->subject('Test mail');
    		$message->from('senthil.noahdata@gmail.com', 'Senthil');
    	});
    }
}