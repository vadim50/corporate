<?php
namespace Corp\Http\Controllers;

use Corp\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Corp\Http\Requests;
use Validator;
use Auth;

class CommentController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $data = $request->except('_token','comment_post_ID');

        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');

        $validator = Validator::make($data,[

            'article_id' => 'required|integer',
            'parent_id' => 'required|integer',
            'text' => 'required|string'
        ]);

        
        
         $validator->sometimes(['name','email'],'required|max:255',function($input){
             return !Auth::check();
         });
        if($validator->fails()){return \Response::json(['error'=>$validator->errors()->all()]);}

        //if($validator->fails()){
            //return \Response::json(['error'=>$validator->errors()->all()]);
            //return 'ok';
        //}

         
        echo json_encode(['hello' => 'World']);

        exit();
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
        //
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
