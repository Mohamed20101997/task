<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentInterface;
use App\Models\Student;


class StudentRepository implements StudentInterface {

    /**
     * @var Student $studentModel
     */
    private $studentModel;

    /**
     * StudentRepository constructor.
     * @param Student $student
     */
    public function __construct(Student $student){
        $this->studentModel = $student;
    }


    public function index()
    {
        $students = $this->studentModel::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.students.index',compact('students'));

    }//end of index function


    public function create()
    {

        return view('dashboard.students.create');

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $this->studentModel->create($data);

            session()->flash('success', 'Student added successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $student = $this->studentModel::find($id);

        if($student){
            return view('dashboard.students.edit', compact('student'));
        }else{
            return redirect()->back()->with(['error'=>'this student is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $student =  $this->studentModel->find($request->id);
            $data = $request->except('_token');

            $student->update($data);

            session()->flash('success', 'Student Updated successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $student =  $this->studentModel->find($id);

            if(!$student)
            {
                return redirect()->back()->with(['error'=>'student not found']);
            }

            $student->delete();

            session()->flash('success', 'Student deleted successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of student class
