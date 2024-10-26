<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Uncomment the view line if you want to return a view
    // return view('welcome');

    // Select query
     $users = User::get();
    //  $user=DB::table('users')->insert([
    //     'username'=>'sadia',
    //     'email'=>'sadia2@gmail.com',
    //     'password'=>"password"
    //  ]);
    

    //Insert query
    // $user = DB::insert("insert into users (username, email, password) values (?, ?, ?)", [
    //     "rafa",
    //     "rafa@gmail.com",
    //     "123456"
    // ]);
    // $user = User::create([
    //     'username' => 'anwar',
    //     'email' => 'anwar3@gmail.com',
    //     'password' => bcrypt('anwar') // It’s recommended to hash passwords
    // ]);
    $user = User::create([
        'username' => 'farook',
        'email' => 'farook5@gmail.com',
        'password' => 'farook' // Hashing the password
    ]);

    //   $update = DB::update("update users set email = 'mahmudhasansadi92@gmail.com' where id = 1");
    //   $updates = DB::update("update users set email = 'isratjahan@gmail.com' where id = 2");

    //delete data from db
    // $user=DB::delete('delete from users where id=1');


    // Display the result of the insert operation
    dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
