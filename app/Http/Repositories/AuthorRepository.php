<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthorInterface;
use App\Models\Author;


class AuthorRepository implements AuthorInterface {

    /**
     * @var Author $authorModel
     */
    private $authorModel;

    /**
     * AuthorRepository constructor.
     * @param Author $author
     */
    public function __construct(Author $author){
        $this->authorModel = $author;
    }


    public function index()
    {
        $authors = $this->authorModel::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.authors.index',compact('authors'));

    }//end of index function


    public function create()
    {
        return view('dashboard.authors.create');

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');
            $data['social_links'] = json_encode($request->social_links);

            if($request->image)
            {
                \Image::make($request->image)->save(storage_path('app/public/images/'. $request->image->hashName()));

                $data['image'] = $request->image->hashName();
            }


            $this->authorModel->create($data);

            session()->flash('success', 'Author added successfully');

            return redirect()->route('author.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $author = $this->authorModel::find($id);
        if($author){
            $linkes = json_decode($author->social_links, true);
            return view('dashboard.authors.edit', compact('author','linkes'));
        }else{
            return redirect()->back()->with(['error'=>'this author is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $author =  $this->authorModel->find($request->id);

            $data = $request->except('_token');
            $data['social_links'] = json_encode($request->social_links);

            if($request->has('image'))
            {
                // helper_function :  for delete the previous image
                remove_previous('public', $author);
                \Image::make($request->image)->save(storage_path('app/public/images/'. $request->image->hashName()));
                $data['image'] = $request->image->hashName();

            } //end of if

            $author->update($data);

            session()->flash('success', 'Author Updated successfully');

            return redirect()->route('author.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $author =  $this->authorModel->find($id);

            if(!$author)
            {
                return redirect()->back()->with(['error'=>'author not found']);
            }

            $author->delete();
            remove_previous('public',$author);
            session()->flash('success', 'Author deleted successfully');

            return redirect()->route('author.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of author class
