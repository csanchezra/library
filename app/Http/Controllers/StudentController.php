<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use DataTables;


class StudentController extends Controller
{

  public function create()
  {
    return view("students.create");
  }

  public function store(Request $request)
  {
    // echo "<pre>";print_r($request->all());
    // die();
    // $validator = $request->validate();
    // if($validator)
    // {
      // $data_insert = $request->all();
      // $simple_password = $data_insert['password'];
      // unset($data_insert['password']);
      // $data_insert['password'] = Hash::make($simple_password);
      Student::create($request);
      return redirect()->route('student-new');
    // }
    // else
    // {
      // return Redirect::route('home')->withErrors($validator)->withInput();
    // }
  }

  public function show_waiting_students(Request $request){
      // $students = Student::where(['approved'	=> 0])->orderBy('student_id','desc')->paginate(1);

      // $data = Student::where(['approved'	=> 0])->orderBy('student_id','desc');
      // echo "<pre>";print_r($data);die();
      if ($request->ajax()) {
          $data = Student::where(['approved'	=> 0,'rejected' => 0]);

          return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('approve', function($row){
                          // $btn = '';
                          // if($row->approved == 0)
                          $btn = '<a onclick=approve('.$row->student_id.') class="edit btn btn-primary btn-sm">Approve</a>';

                          return $btn;
                  })
                  ->addColumn('reject', function($row){
                          // $btn = '';
                          // if($row->approved == 0)
                          $btn = '<a onclick=reject('.$row->student_id.') class="edit btn btn-primary btn-sm">Reject</a>';
                          return $btn;
                  })
                  ->rawColumns(['approve','reject'])
                  ->make(true);
      }

      return view("students.students_status");
  }

  public function show_approved_students(Request $request){
    if ($request->ajax()) {

        // $data = Student::select()->orderBy('student_id','desc');

        $data = Student::select()
        ->selectRaw('CASE
        WHEN approved = 1 THEN "approved"
        WHEN rejected = 1 THEN "rejected"
        ELSE ""
        END AS status_student');

        return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
      return view("students.all_students");
  }

  public function ajaxRequestStatus(Request $request)
{
    // $input = $request->all();

    // Student::update($input);

    // $student->update($request->all());


    $userData = Student::find($request->student_id);
    if(isset($request->approved)) $userData->approved = $request->approved;
    if(isset($request->rejected)) $userData->rejected = $request->rejected;
// $userData->name = request('name');
// $userData->email = request('email');
// $userData->phone = request('phone');
// $userData->city = request('city');

// echo "<pre>";print_r($userData);die();

$userData->save();

    return response()->json(['success'=>'Got Simple Ajax Request.']);
}

}
