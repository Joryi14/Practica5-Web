<?php
  require_once('models/publisher.php');

  class publisherController extends Controller {

    public function index() {  
     # return view('publishers/index',
     # ['publisher'=>publisher::all(),
     # 'title'=>'Publisher List']);
     $publisher = DB::table('publisher')->get();
      return view('publishers/index', ['title'=>'Publisher List','publisher' => $publisher,'login'=>Auth::check()]);
    }
    public function show($id) {
      $publisher = DB::table('publisher')->find($id);
      return view('publishers/show',
       ['publisher'=>$publisher,
      'title'=>'Publisher Detail',
      'show'=>true,'create'=>false,'edit'=>false,'login'=>Auth::check()]);
    }
    public function create() {
      if (!Auth::check()) return redirect('/login');
      $publisher = ['publisher'=>'','country'=>'',
                 'founded'=>'','genere'=>''];
      return view('publishers/show',
        ['title'=>'Publisher Create',
        'publisher'=>$publisher,
        'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
    }  

    public function store() {
      if (!Auth::check()) return redirect('/login');
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['publisher'=>$publisher,'country'=>$country,'founded'=>$founded,
               'genere'=>$genere];
      DB::table('publisher')->insert($item);
      return redirect('/publisher');
    }  

    public function edit($id) {
      if (!Auth::check()) return redirect('/login');
      $publisher = DB::table('publisher')->find($id);
      return view('publishers/show',
        ['publisher'=>$publisher,
         'title'=>'Publisher Edit','show'=>false,'create'=>false,'edit'=>true,'login'=>Auth::check()]);
    }  

    public function update($_,$id) {
      if (!Auth::check()) return redirect('/login');
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['publisher'=>$publisher,'country'=>$country,'founded'=>$founded,
               'genere'=>$genere];
      DB::table('publisher')->update($id,$item);
      return redirect('/publisher');
    }  

    public function destroy($id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('publisher')->delete($id);
      return redirect('/publisher');
    }
  }
?>