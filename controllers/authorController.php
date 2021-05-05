<?php
  require_once('models/author.php');

  class authorController extends Controller {

    public function index() {  
    # return 
     # view('authors/index',
      # ['author'=>author::all(),
       #'title'=>'Author List']);
      $author = DB::table('author')->get();
      return view('authors/index', ['title'=>'Author List','author' => $author,'login'=>Auth::check()]);
    }

    public function show($id) {
      $author = DB::table('author')->find($id);
      return view('authors/show',
        ['author'=>$author,
         'title'=>'Author Detail','show'=>true,'create'=>false,'edit'=>false,'login'=>Auth::check()]);
    }
    public function create() {
      if (!Auth::check()) return redirect('/login');
      $author = ['author'=>'','nationality'=>'',
      'birth_year'=>'','fields'=>''];
      return view('authors/show',
        ['title'=>'author Create','author'=>$author,
        'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
    }  

    public function store() {
      if (!Auth::check()) return redirect('/login');
      $author = Input::get('author');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth_year');
      $field = Input::get('fields');
      $item = ['author'=>$author,'nationality'=>$nationality,'birth_year'=>$birth,
               'fields'=>$field];
      DB::table('author')->insert($item);
      return redirect('/author');
    }  

    public function edit($id) {
      if (!Auth::check()) return redirect('/login');
      $author = DB::table('author')->find($id);
      return view('authors/show',
        ['author'=>$author,
         'title'=>'Author Edit','show'=>false,'create'=>false,'edit'=>true,'login'=>Auth::check()]);
    }  

    public function update($_,$id) {
      if (!Auth::check()) return redirect('/login');
      $author = Input::get('author');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth_year');
      $field = Input::get('fields');
      $item = ['author'=>$author,'nationality'=>$nationality,'birth_year'=>$birth,
               'fields'=>$field];
      DB::table('author')->update($id,$item);
      return redirect('/author');
    }  

    public function destroy($id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('author')->delete($id);
      return redirect('/author');
    }
  }
?>