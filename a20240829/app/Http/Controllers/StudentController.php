<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Hobby;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // foreach (Flight::all() as $flight) {
        //     echo $flight->name;
        // }

        // $users = DB::table('users')
        //         ->where('votes', '=', 100)
        //         ->where('age', '>', 35)
        //         ->get();

        // $data = DB::table('students')
        //     ->get();

        $data = Student::with('phoneRelation')->with('hobbiesRelation')->get();


        // dd($data[0]->phoneRelation->phone);
        // $data = Student::find(1)->phoneRelation->phone;
        // $data = Student::find(1)->phoneRelation->student_id;
        // dd($data);

        foreach ($data as $key => $value) {
            $rankText = 1;
            if ($value['id'] > 2) {
                $rankText = 2;
            }
            $data[$key]['rank'] = $rankText;


            $data[$key]['hobbies'] = "";
            $tmpArr = [];
            foreach ($data[$key]->hobbiesRelation as $key2 => $value2) {
                array_push($tmpArr, $value2['hobby']);
            }
            // dd($tmpArr);
            $data[$key]['hobbies'] = implode(",", $tmpArr);
            // dd($data[$key]->hobbiesRelation);

        }
        // dd($data);



        return view('student.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->mobile = $request->mobile;
        $student->save();


        $phone = new Phone();
        $phone->student_id = $student->id;
        $phone->phone = $request->phone;
        $phone->save();

        $hobby = new Hobby();
        $hobby->student_id = $student->id;
        $hobby->hobby = $request->hobby;
        $hobby->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('hello StudentController edit');
        // dd($id);
        // $data = Student::find($id);
        // $data = Student::where('id', $id)->first();
        $data = Student::with('hobbiesRelation')->where('id', $id)->first();
        $data['hobbies'] = "";
        $tmpArr = [];
        foreach ($data->hobbiesRelation as $key2 => $value2) {
            array_push($tmpArr, $value2['hobby']);
        }
        // dd($tmpArr);
        $data['hobbies'] = implode(",", $tmpArr);
        // dd($data);
        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd('hello StudentController update action');
        // $input = $request->all();
        $input = $request->except('_token', '_method');
        // dd($input);

        // 主表 student
        $data = Student::where('id', $id)->first();
        $data->name = $input['name'];
        $data->mobile = $input['mobile'];
        $data->save();

        // 子表 phone
        $data = Phone::where('student_id', $id)->delete();

        // Phone
        $phone = new Phone();
        $phone->student_id = $id;
        $phone->phone = $request->phone;
        $phone->save();

        // 子表 hobby 對多
        $data = Hobby::where('student_id', $id)->delete();

        // Phone
        $hobby = new Hobby();
        $hobby->student_id = $id;
        $hobby->hobby = $request->hobby;
        $hobby->save();



        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Student::where('id', $id)->first();
        $data->delete();
        return redirect()->route('students.index');
    }


    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
