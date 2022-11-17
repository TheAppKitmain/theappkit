<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/* Import necessary packages */
use Mail;
use App\Mail\SendUsersList;
use DB;
use Carbon\Carbon;
use App\Console\Commands\DateTime;

class RegisterUsersList extends Command
{
/**
* The name and signature of the console command.
*
* @var string
*/
/* Add signature value */
protected $signature = 'registered:users';

/**
* The console command description.
*
* @var string
*/
protected $description = 'List of registered users';

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
// /* Read the current system date */
// $today = Carbon::now()->toDateString();

// /* Get the list of users information who are registered
// in the current system date */
// $current_registered_users = DB::table('users')->whereDate('created_at', $today)->get()->toArray();
// /* Create the object of the mailable class with the array variable
// that contains the currently registered users list */
// $email = new SendUsersList($current_registered_users);

// /* Send email using Mail class */
// Mail::to('receiver email address')->send($email);
return 0;

}
}