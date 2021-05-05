<?php
 
  Route::get('/',function() { return view('Index1',['login'=>Auth::check()]);});
  
  Route::resource('book', 'booksController');
  Route::resource('author', 'authorController');
  Route::resource('publisher', 'publisherController');

  Route::get('/book/(:number)/delete','booksController@destroy');
  Route::get('/author/(:number)/delete','authorController@destroy');
  Route::get('/publisher/(:number)/delete','publisherController@destroy');
 
  //Route::get('book', 'booksController@index');
  //Route::get('book/(:number)', 'booksController@show');
  //Route::get('author','authorController@index');
  //Route::get('author/(:number)', 'authorController@show');
  //Route::get('publisher', 'publisherController@index');
  //Route::get('publisher/(:number)', 'publisherController@show');
  Route::get('login', 
             'LoginController@showLoginForm');
  Route::get('loginFails', 
             'LoginController@LoginFails');           
  Route::post('login', 
                      'LoginController@login');  
  Route::get('logout', 'LoginController@logout');  

  // Registration Routes  
  Route::get('register', 
        'RegisterController@showRegistrationForm');  
  Route::post('register', 
                    'RegisterController@register');
  Route::dispatch();
?>
