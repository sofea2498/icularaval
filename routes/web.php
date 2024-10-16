<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () { 
    return view('home');})->name('home');

//to display some values using parameter
Route::get('/home/{name}', function ($name) { 
    return view('home', ['name' => $name ]); });

Route::get('/home/{name}', function () { 
    return view('home', ['name' => "team" ]); });


Route::get('/about', function () { 
    return view('about'); })->name('about');;

Route::get('/auth/signin', function () {
    return view('auth.signin');
});

//Named Route
Route::get('/user/profile', function () {
    return 'Pengguna Profile Baru';
})->name('user.profile');

//Route Parameter
Route::get('/user/{name}', function ($name,) {
    return 'User '.$name;
});

//Roure Parameter
Route::get('/user/{name}/{age}', function ($name,$age) {
    return 'User '.$name . 'age is ' .$age;
});

// //other example route parameter
// Route::get('/user/{name}', function ($name,) {
//     return 'User '.$name;
// });

//Named Route -> alias of a route userprofile = /pegguna/profile
Route::get('/people/profile', function () {
    return 'Pengguna Profiles';
})->name('user.profile');

//Redirect route to named route 
Route::get('/redirect-to-profile', function () {
    return redirect()->route('user.profile');
});

//Route Group -> to group the function folder, maksudnya macam tak payah nak tulis banyak  kali dekat dalam coding kalau dalam browser yg sama
Route::prefix('food')->group(function () {

    Route::get('/details', function () {
        return 'Food details are following';
    });

    Route::get('/home', function () {
        return 'Food home page';
    });
    
});


//Combination of all above above (route, named route, route param, route group, route prefix)
Route::name('job')->prefix('job')->group(function () {

    Route::get('/home', function ($name) {
        return 'Job name: '.$name;
    })->name('.home');

    Route::get('/details', function () {
        return 'Job details are following';
    })->name('.description');
    
});

require __DIR__.'/feed/web.php';


