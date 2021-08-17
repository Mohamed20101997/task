<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TagInterface;
use App\Models\Tag;


class TagRepository implements TagInterface {

    /**
     * @var Tag $tagModel
     */
    private $tagModel;

    /**
     * TagRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag){
        $this->tagModel = $tag;
    }


    public function index()
    {
        $tags = $this->tagModel::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.tags.index',compact('tags'));

    }//end of index function


    public function create()
    {
        return view('dashboard.tags.create');

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $this->tagModel->create($data);

            session()->flash('success', 'Tag added successfully');

            return redirect()->route('tag.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $tag = $this->tagModel::find($id);

        if($tag){
            return view('dashboard.tags.edit', compact('tag'));
        }else{
            return redirect()->back()->with(['error'=>'this tag is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $tag =  $this->tagModel->find($request->id);

            $data = $request->except('_token');

            $tag->update($data);

            session()->flash('success', 'Tag Updated successfully');

            return redirect()->route('tag.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $tag =  $this->tagModel->find($id);

            if(!$tag)
            {
                return redirect()->back()->with(['error'=>'tag not found']);
            }

            $tag->delete();


            session()->flash('success', 'Tag deleted successfully');

            return redirect()->route('tag.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of tag class
