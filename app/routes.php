<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

    // $facebook = new Facebook(array(
    //     'appId' => Config::get('facebook.appId'),
    //     'secret' => Config::get('facebook.secret')
    // ));

    //    dd($facebook);

Route::get('/', function()
{ 
// 	if(Auth::check()){
// return Redirect::route('Reservation');
// 	}
// 	return View::make('home.home');
	return Redirect::to('Reservation');


});
Route::post('cancelresrvation',array('uses'=>'ReservationController@postCancelReservation'));
Route::get('Reservation',array('uses'=>'ReservationController@showReservation'));
Route::get('myreservation',function(){
	$data=BusReservations::where('user_id','=',Auth::user()->user_id)
	->get();
	return View::make('Reservation.myreserveseats',array('myreserve'=>$data));
});
Route::get('mycancel',function(){
	$data=Cancel::where('user_id','=',Auth::user()->user_id)->get();
	return View::make('Reservation.mycancel',array('mycancel'=>$data));
});





Route::get('Registration',function(){

	return View::make('Registration.registration');
});
Route::get("logout",array('uses'=>'HomeController@logout'));
Route::get('history',array('uses'=>'HomeController@history'));
Route::get('contactus',array('uses'=>'HomeController@contacus'));
Route::get('route',array('uses'=>'HomeController@routes'));

Route::post('Routes/search',array('before'=>'csrf','uses'=>'ReservationController@postSearch'));
Route::post('Routes/Reserve',array('before'=>'csrf','uses'=>'ReservationController@postReserve'));

Route::post('Register',array('before'=>'csrf','uses'=>'HomeController@NewUser'));
Route::post('login',array('before'=>'csrf','uses'=>'HomeController@login'));


/*ADMIN*/

Route::get('admin/login',function(){
if(Auth::check()){
		if(Auth::user()->Account_type=='A'){
				return Redirect::to('admin/page');
		}
}

return View::make('admin.login');
});
Route::get('admin/logout',function(){
	Auth::logout();	
	return Redirect::to('admin/login');
});
Route::get('admin/page',function(){//viewing
return View::make('admin.page');
});
Route::get('admin/addbus',function(){
return View::make('admin.addbus');
});
Route::get('admin/addgenreport',function(){
return View::make('admin.reportbus');
});


Route::get('admin/Reservationpayment',array('uses'=>'AdminController@showPayment'));
Route::get('admin/ValidTicket',array('uses'=>'AdminController@showValidTicket'));
Route::get('admin/addRoute',array('uses'=>'AdminController@showAddRoute'));
Route::post('Admin/AddRoute',array('uses'=>'AdminController@postAddRoute'));
Route::post('BusTicket',array('uses'=>'AdminController@postBusTicket'));
Route::post('admin/viewdetails',array('uses'=>'AdminController@postViewDetails'));
Route::post('admin/login',function(){
	$rules=array('Email'=>'Required','password'=>'Required');
	$user=array('Email'=>Input::get('Email'),'password'=>Input::get('Password'));

	$validation=Validator::make($user,$rules);
	
		if($validation->passes()){
				if(Auth::attempt($user)){
					if(Auth::user()->Account_type=='A'){
						return Redirect::to('admin/page');
						}
				Auth::logout();
				return Redirect::back()->with(array('Accnot_found'=>1));
				}
				return Redirect::back()->with(array('Accnot_found'=>1));
		}	
	
		return Redirect::back()
				->withErrors($validation);
	});

/*Addimg Bus*/
Route::post('admin/AddBus',array('before'=>'csrf','uses'=>'AdminController@postAddBus'));
Route::post('admin/payReservation',array('before'=>'csrf','uses'=>'AdminController@postPaid'));




Route::post('Register',array('before'=>'csrf','uses'=>'HomeController@NewUser'));
Route::post('login',array('before'=>'csrf','uses'=>'HomeController@login'));

?>