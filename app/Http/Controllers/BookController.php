<?php

namespace App\Http\Controllers;
use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use MongoDB\Driver\ServerApi;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Command;
use MongoDB\Driver\Exception;

class BookController extends Controller
{

  public function show(Request $request){
      // return view("books.addbook")->with('categories_list', $categories_list);
// echo "<pre>";print_r($request->all());die();

      if ($request->ajax()) {
          $data = Book::select('book_id','title','author','description','book_categories.category', 'books.category_id')
          ->join('book_categories', 'book_categories.id', '=', 'books.category_id')
          ->orderBy('book_id');

          return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('total_books', function($row){
                    $total = Issue::select()
                      ->where('book_id','=',$row->book_id)
                      ->count();
                      return $total;
                  })
                  ->addColumn('available', function($row){
                    $available = Issue::select()
            					->where([
                      'book_id'=> $row->book_id,
            					'available_status'	=> 1])
            					->count();

                      return $available;
                  })
                  ->rawColumns(['total_books','available'])
                  ->make(true);

      }

      return view("books.books");

  }


  public function create(){
      $categories_list = BookCategory::select()->orderBy('category')->get();
      return view("books.addbook")->with('categories_list', $categories_list);
  }

  public function store(Request $request)
  {
  $user_id = Auth::id();
  $array_insert = $request->all();
  $array_insert['added_by'] = $user_id;

  Book::create($array_insert);
  return redirect()->route('home');
  }

  public function store_category(Request $request)
  {
  $categoria = BookCategory::create($request->all());
  return redirect()->route('home');
  }

  public function create_category(){
      return view("books.addcategory");
  }


  public function example_mongo()
  {
    $serverApi = new ServerApi(ServerApi::V1);
  $manager = new Manager(
      'mongodb+srv://csanchez91:Ipu9VX1qLJZRT2Zq@cluster0.ogwvh.mongodb.net/test?retryWrites=true&w=majority', [], ['serverApi' => $serverApi]);

      $command = new Command(['buildInfo' => 1]);

      try {
          $cursor = $manager->executeCommand('admin', $command);
      } catch(Exception $e) {
          echo $e->getMessage(), "\n";
          exit;
      }

      /* The buildInfo command returns a single result document, so we need to access
       * the first result in the cursor. */
      $buildInfo = $cursor->toArray()[0];


      echo $buildInfo->version, "\n";

  }

}
