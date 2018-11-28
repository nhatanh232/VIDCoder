<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZingerModel;
use Calendar;
use MaddHatter\LaravelFullcalendar\Event;
use Auth;
use Validator;
Use Redirect;
Use Carbon\Carbon;
use App\DSNV;
use DateTime;

class ZingerController extends Controller
{


	public function Calendar(Request $Request){
//   $events = [];
//   $events[] = \Calendar::event(
//         'Event One', //event title
//         false, //full day event?
//         '2015-06-05T0800', //start time (you can also use Carbon instead of DateTime)
//         '2015-06-05T0800', //end time (you can also use Carbon instead of DateTime)
//         0 //optionally, you can specify an event ID
//     );
//   $events[] = \Calendar::event(
//     "Valentine's Day", //event title
//     false, //full day event?
//     new \DateTime('2018-06-14 13:00:00'), //start time (you can also use Carbon instead of DateTime)
//     new \DateTime('2018-06-14 14:00:00'), //end time (you can also use Carbon instead of DateTime)
// 	'stringEventId' //optionally, you can specify an event ID
// );
//   $events[] = \Calendar::event(
//     "Valentine's Day2", //event title
//     true, //full day event?
//     new \DateTime('2018-06-14'), //start time (you can also use Carbon instead of DateTime)
//     new \DateTime('2018-06-14'), //end time (you can also use Carbon instead of DateTime)
// 	'stringEventId' //optionally, you can specify an event ID
// );

  $eloquentEvent = ZingerModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

//     $calendar = \Calendar::addEvents($events) //add an array with addEvents
    // ->addEvent($eloquentEvent, [ //set custom color fo this event
    //     'color' => '#800',
    // ])->setOptions([ //set fullcalendar options
    //     'firstDay' => 1
    // ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
    //     'viewRender' => 'function() {alert("Callbacks!");}'
    // ]);

   

// return view('hello', compact('calendar'));
// }
		$events = ZingerModel::get();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->title,
                false,
                new \DateTime($event->start),
                new \DateTime($event->end)
                 
            );
            
    	}
    	
    	$calendar = Calendar::addEvents($event_list,['borderColor'=>'green'])->setOptions(['timeFormat'=>'H(:mm)',

    ]);
    	
; 

        return view('datxe.zinger', compact('calendar') );
    }

public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/zinger')->withInput()->withErrors($validator);
        }
     	$di = $request->di;
     	$toi = $request->toi;
     	$convertbd =  str_replace('T',' ',$request->start_date.":00");
     	$convertkt =  str_replace('T',' ',$request->end_date.":00");
        $dieukien = \DB::Table('zinger')->Select()->where('start','<=',$convertbd)->where('end','>=',$convertkt)->count();
        $phongban = DSNV::Select('Phongban')->Where('Manv',Auth::user()->Manv)->get();
     foreach ($phongban as $key) {
         $title2 = $key->Phongban;
     }
     $timeout = substr($convertkt,-8,5);
     if($dieukien>=1)
       {  \Session::flash('datphong','Xe đã đặt');
        return Redirect::to('/zinger');
    }
      else 
      { $event = new ZingerModel;
        $event->title = '-'.$timeout.' '.$request['event_name'].'-'.Auth::user()->name.'-'.$title2;
        $event->start = $convertbd;
        $event->end = $convertkt;
         $event->all_day = "0";
         $event->background_color="red";
         $event->di = $di;
         $event->toi = $toi;
        $event->save();
    }

        \Session::flash('success','Event added successfully.');
        return Redirect::to('/zinger');
    }
}
