<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	function __construct(){
		/*
			
			Closed thebus reservation
	
		*/
			$getBus=DB::table('buses')->where('availableseats','=',0)->get();
			foreach ($getBus as $eachget) {
				DB::table('buses')->where('busid',$eachget->busid)->update(array('status'=>'CLOSED'));
			}
		/*
		|Update the Expiration of Bus Reservation
		|
		|Update the if the Bus Already reach the destination and Going back so the 
		|System will generate new ticket
		|
		|
		*/
		$currentDate=date_create(date('Y-m-d H:i:s'));
		$busReserve=DB::table('buses')
		->join('bus_reservations','bus_reservations.busid','=','buses.busid')
		->where('bus_reservations.status','=','RESERVED')
		->get();



		foreach ($busReserve as $busesDate) {
			$date=date_diff($currentDate,date_create($busesDate->created_at));
			
			if($date->format('%H')>3){
				DB::table('bus_reservations')->where('busid',$busesDate->busid)			
				->update(array('status'=>'CANCEL','created_at'=>$busesDate->created_at));

				DB::table('cancels')->insert(array('busid'=>$busesDate->busid,
					'time'=>$currentDate,
					'seatno'=>$busesDate->seatno,
					'user_id'=>$busesDate->user_id,
					'ticketno'=>$busesDate->ticketno,
					'reason'=>'EXPIRED'
					));
				DB::table('buses')->where('busid',$busesDate->busid)
				->update(array('availableseats'=>$busesDate->availableseats+1));

			}
		}

		/*
		*If the Bus status is onboard
		*it will update ticket,the seats,route date of arrive ,and the Buss tatus
		*/

		$Buses=DB::table('buses')	
		->where('status','=','ONBOARD')
		->get();
		
		foreach ($Buses as $Bus) {	
				DB::table('bus_reservations')->where('busid',$Bus->busid)->where('status','PAID')->update(array('valid_ticket'=>'NO'));		
				for ($i=1; $i <=$Bus->capacity ; $i++) {
					DB::table('tickets')->insert(array('busid'=> $Bus->busid,'created_at'=>date('created_at')));
					$ticketno=DB::table('tickets')->orderBy('ticketno','desc')->first();
					DB::table('seats')->where('busid',$Bus->busid)->update(array('ticketno'=>$ticketno->ticketno));
				}
					;
				// $date=date('Y-m-d H:i:s',strtotime($Bus->created_at.'+ 7 days'));
					$date=date('Y-m-d',strtotime(date('Y-m-d').'+ 1 days'));
									

				DB::table('buses')->where('busid',$Bus->busid)->update(array('status'=>'WAITING','availableseats'=>0,'created_at'=>$Bus->created_at));
				DB::table('bus_routes')->where('busid',$Bus->busid)->update(array('departure_date'=>$date));		

		}


	}
	protected function setupLayout(){
	//	$this->__construct();

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}



}