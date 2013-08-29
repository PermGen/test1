<?php

class AdminController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// the specified resource from storage.
	 
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postAddBus(){
		$rules=array('BusType'=>'required','BusCapacity'=>'required|integer','busplate_no'=>'required|Alphanum|Unique:buses');
		$input=Input::all();
		$Bustype=Input::get('BusType');
		$BusCapacity=Input::get('BusCapacity');
		$BusPlateNo=Input::get('busplate_no');
$validation=Validator::make($input,$rules);
if($validation->passes()){
		$Bus= new Bus;
		$Bus->bustype=$Bustype;
		$Bus->capacity=$BusCapacity;
		$Bus->availableseats=0;
		$Bus->busplate_no=$BusPlateNo;
		$Bus->save();

		$Busid=DB::table('buses')
		->where('busplate_no','=',$BusPlateNo)
		->first();

		$seatid=DB::table('seats')->orderBy('seatid','desc')
		->first();

		$num;
		$ticketNo=DB::table('tickets')->orderBy('ticketno','desc')->first();
		$num2;
		if(is_null($ticketNo)){
			$num2=0;
		}
		else{
			$num2=$ticketNo->ticketno;
		}
		for ($i=1; $i <=$BusCapacity ; $i++) { 			
		$num=$seatid->seatid+$i;
		DB::table('seats')->insert(array('busid' => $Busid->busid,'seatno'=>($Busid->busid."-".$num),'ticketno'=>$num2+$i));				
		DB::table('tickets')->insert(array('busid'=> $Busid->busid,'created_at'=>date('created_at')));
		}

		return Redirect::back()->with(array('messages'=>1));
}


		return Redirect::back()->withErrors($validation);
		}

		public function showPayment(){
			if(Session::has('admineachdetails')){
				$users=Session::get('users');
				$name=DB::table('users')->where('user_id','=',$users)->first();
				$Fullname=$name->First_Name." ".$name->Last_Name;
			$Reservations=DB::table('bus_reservations')->where('status','=','RESERVED')->where('user_id','=',$users)->get();
			return View::make('admin.Payment')->with(array('Reservations'=>$Reservations,'Name'=>$Fullname,'userid'=>$users));
			}
			$Reservations=DB::table('bus_reservations')->where('status','=','RESERVED')->get();
			return View::make('admin.Payment')->with(array('Reservations'=>$Reservations));
		}


		public function showValidTicket(){
				if(Session::has('searching')){
				$bus=DB::table('bus_reservations')->where('busid','=',Session::get('busid'))->get();

				return View::make('admin.ValidTickets',array('buses'=>$bus,'search'=>0,'each'=>1));		
				}

				$bus=Bus::all();
				return View::make('admin.ValidTickets',array('buses'=>$bus,'search'=>0,'each'=>0));
		}


		public function showUpdateStatus(){
			
		}


		public function showAddRoute(){
			$bus=Bus::all();
			return View::make('admin.addroute',array('bus'=>$bus));
		}


		public function showEditRoute(){
			
		}
		public function postBusTicket(){
			return Redirect::back()->with(array('searching'=>1,'busid'=>Input::get('busid')));
		}

		public function postAddRoute(){
			$rules=array('departure_time'=>'required',
						 'departure_date'=>'required',
						 'amount'=>'required|integer',
						 'leaving_from'=>'required',
						 'going_to'=>'required',
						 'busid'=>'required'
						 );
			$validation=Validator::make(Input::all(),$rules);
			if($validation->passes()){
				$route=new BusRoute;
				$route->busid=Input::get('busid');
				$route->departure_date=Input::get('departure_date');
				$route->departure_time=Input::get('departure_time');
				$route->leaving_from=Input::get('leaving_from');
				$route->going_to=Input::get('going_to');
				$route->amount=Input::get('amount');
				$route->save();

				return Redirect::back()->with(array('SuccessMsg'=>'SuccessFully Added Route'));
			}
			    return Redirect::back()->with(array('ErrorMsg'=>'Error Occured. Please Check the fields'))

			    ->withErrors($validation);
		}
		public function postViewDetails(){
			return Redirect::to('admin/Reservationpayment')->with(array('admineachdetails'=>1,'users'=>Input::get('reserve')));
		}
		public function postPaid(){
			$discountPercent=0.12;
			$user=Input::get('userid');
			$discount=Input::get('discounted');
			$pay=Input::get('pay');
			if(count($pay)==0){
				return Redirect::back()->with(array("AdminErrorMessage"=>"Nothing To save"));
							}

					foreach ($pay as $payment) {
							$seat=explode('-',$payment);
							$seatno=DB::table('seats')->where('seatno','=',$seat[0]."-".$seat[1])->first();
							$bus_reserv=DB::table('bus_reservations')->where('seatno','=',$seat[0]."-".$seat[1])->where('status','=','RESERVED')->first();
							DB::table('bus_reservations')->where('bus_resvid',$bus_reserv->bus_resvid)->update(array('status'=>'PAID','ticketno'=>$seatno->ticketno));
						if(count($discount)!=0 && in_array($payment, $discount)){
								//update the busresrve tb with PAID and ticket num 
							//upadate ticket with price and dicount
							$tickets=DB::table('tickets')
							->where('ticketno',$seatno->ticketno)
							->update(array('route_id'=>$bus_reserv->route_id,
								'amount'=>$seat[2]-($seat[2]*$discountPercent),
								'date'=>date('Y-m-d H:i:s'),
								'discount'=>$seat[2]*$discountPercent));
							

						}
						else{
								//update the busresrve tb with PAID and ticket num 
							//upadate ticket with price
							$tickets=DB::table('tickets')
							->where('ticketno',$seatno->ticketno)
							->update(array('route_id'=>$bus_reserv->route_id,
								'amount'=>$seat[2],
								'date'=>date('Y-m-d H:i:s'),
								'discount'=>0));
						}
					}
			return Redirect::back()->with(array("AdminSuccess"=>"User Successfully Paid"));
		}
}