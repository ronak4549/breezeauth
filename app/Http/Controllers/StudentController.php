<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::paginate(5);
        return view('students.index', compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([]);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = date('Ymd') . "IMG_" . time() . '.' . $file->extension();
            $file->move(public_path('/images/profile/'), $fileName);
        } else {
            $fileName = "";
        }

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $resumeFile = date('Ymd') . "File_" . time() . '.' . $file->extension();
            $file->move(public_path('/files/resumes/'), $resumeFile);
        } else {
            $resumeFile = "";
        }
        $insertData = new Student();
        $insertData->first_name = $request->first_name;
        $insertData->last_name = $request->last_name;
        $insertData->email = $request->email;
        $insertData->gender = $request['gender'] ? $request['gender'] : 'Male';
        $insertData->status = $request->status;
        $insertData->profile = $fileName;
        $insertData->resume = $resumeFile;
        $insertData->save();
        return redirect()->route('students.index')->with('success', 'Students Detail Added Successfully.');
        //return redirect('admin/students-list')->with('success', 'Students Detail Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students =  Student::find($id);
        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = date('Ymd') . "IMG_" . time() . '.' . $file->extension();
            $file->move(public_path('/images/profile/'), $fileName);
        } else {
            $fileName = "";
        }
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $resumeFile = date('Ymd') . "File_" . time() . '.' . $file->extension();
            $file->move(public_path('/files/resumes/'), $resumeFile);
        } else {
            $resumeFile = "";
        }
        $updateData = Student::find($request->id);
        $updateData->first_name = $request->get('first_name');
        $updateData->last_name = $request->get('last_name');
        $updateData->email = $request->get('email');
        $updateData->gender = $request['gender'] ? $request['gender'] : 'Male';
        $updateData->status = $request->get('status');
        if ($request->hasFile('profile')) {
            $updateData->profile = $fileName;
        }
        if ($request->hasFile('resume')) {
            $updateData->resume = $resumeFile;
        }
        $updateData->save();
        return redirect()->route('students.index')->with('success', 'Students Detail Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->first()->delete();
        return redirect()->route('students.index')
                    ->with('success', 'Students Record deleted Successfully');
    }
}
