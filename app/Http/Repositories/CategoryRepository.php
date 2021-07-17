<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryInterface {

    /**
     * @var Category $categoryModel
     */
    private $categoryModel;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category){
        $this->categoryModel = $category;
    }


    public function index()
    {
        $categories = $this->categoryModel::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.categories.index',compact('categories'));

    }//end of index function


    public function create()
    {
        return view('dashboard.categories.create');

    } //end of create function


    public function store($request)
    {
        try{

            $data = $request->except('_token');
            $this->categoryModel->create($data);
            session()->flash('success', 'Category added successfully');

            return redirect()->route('category.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $category = $this->categoryModel::find($id);

        if($category){
            return view('dashboard.categories.edit', compact('category'));
        }else{
            return redirect()->back()->with(['error'=>'this employee is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $category =  $this->categoryModel->find($request->id);
            $data = $request->except('_token');
            $category->update($data);

            session()->flash('success', 'Category Updated successfully');

            return redirect()->route('category.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $category =  $this->categoryModel->find($id);

            if(!$category)
            {
                return redirect()->back()->with(['error'=>'category not found']);
            }

            $category->delete();

            session()->flash('success', 'Category deleted successfully');

            return redirect()->route('category.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of category class
