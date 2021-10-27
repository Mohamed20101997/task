<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Survey;
use App\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class CustomController extends Controller
{

    protected $surveyModel;
    protected $surveyResponseModel;

    public function __construct(Survey $survey, SurveyResponse $surveyResponse){

        $this->surveyModel = $survey;
        $this->surveyResponseModel = $surveyResponse;
    }


    public function index()
    {
        $customs = DB::table('custom_fields')->select('model_id', 'model_type')->distinct('model_id')->paginate(5);
        return view('dashboard.custom.index',compact('customs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.custom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $survey = $this->surveyModel->first();

        foreach ($request->data as $data){
            $field = $survey->customFields()->create([
                'type'          => !empty($data['type']) ? $data['type'] : null,
                'title'         => !empty($data['label']) ? $data['label'] : null,
                'className'     => !empty($data['className']) ? $data['className'] : null,
                'subtype'       => !empty($data['subtype']) ? $data['subtype'] : null,
                'label'         => !empty($data['label']) ? $data['label'] : null,
                'name'          => !empty($data['name']) ? $data['name'] : null,
                'placeholder'   => !empty($data['placeholder']) ? $data['placeholder'] : null,
                'description'   => !empty($data['description']) ? $data['description'] : null,
                'default_value' => !empty($data['default_value']) ? $data['default_value'] : null,
            ]);

            unset($data['type'],$data['label'],$data['className'],$data['subtype'],$data['name'],$data['placeholder'],$data['description'],$data['default_value'] );
            $attributes = json_encode($data);
             $field->update([
                'attributes' => !empty($attributes) ? $attributes : null,
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.custom.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}