<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentResultsInterface;
use App\Models\Student;
use App\Models\StudentResults;


class StudentResultsRepository implements StudentResultsInterface {

    /**
     * @var StudentResults $studentResultsModel
     */
    private $studentResultsModel;

    /**
     * StudentResultsRepository constructor.
     * @param StudentResults $studentResults
     */
    public function __construct(StudentResults $studentResults){
        $this->studentResultsModel = $studentResults;
    }


    public function index()
    {
        $studentResults = $this->studentResultsModel::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.studentResults.index',compact('studentResults'));

    }//end of index function


    public function create()
    {
        //get all students
        $students = Student::get();
        return view('dashboard.studentResults.create',compact('students'));

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $this->studentResultsModel->create($data);

            session()->flash('success', 'StudentResults added successfully');

            return redirect()->route('student_result.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function

    public function import($request)
    {
        dd('import');

    }//end of import function


    public function edit($request,$id)
    {
        $studentResults = $this->studentResultsModel::find($id);
        $students = Student::get();
        if($studentResults){
            return view('dashboard.studentResults.edit', compact('studentResults','students'));
        }else{
            return redirect()->back()->with(['error'=>'this studentResults is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $studentResults =  $this->studentResultsModel->find($request->id);

            $data = $request->except('_token');

            $studentResults->update($data);

            session()->flash('success', 'StudentResults Updated successfully');

            return redirect()->route('student_result.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $studentResults =  $this->studentResultsModel->find($id);

            if(!$studentResults)
            {
                return redirect()->back()->with(['error'=>'studentResults not found']);
            }

            $studentResults->delete();

            session()->flash('success', 'StudentResults deleted successfully');

            return redirect()->route('student_result.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function



} //end of studentResults class
