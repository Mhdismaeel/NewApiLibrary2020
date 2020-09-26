<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\HelpersFolder\ApiHelpers;
use Illuminate\Http\Request;
use App\Actions\Helper\Success;
use App\Actions\Helper\Fail;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Actions\Book\GetAllBookAction;
use App\Actions\Book\GetBookByIdAction;
use App\Actions\Book\StoreNewBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Actions\Book\DeleteBookAction;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetAllBookAction::execute();

        if($response)
        {
            return Success::execute('get data successfully',$response);

        }
        else
        {
            return Fail::execute('get data error',$response);

        }

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
    public function store(StoreBookRequest $request)
    {
        $response=StoreNewBookAction::execute($request);
        if($response)
        {
            return Success::execute('new_record_created',$response);

        }
        else{
            return Fail::execute('new_record_created error',$response);
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
        $response=GetBookByIdAction::execute($id);
        if($response)
        {

            return Success::execute('get data successfully',$response,200);
        }
        else
        {
            return Fail::execute('get data error',$response,400);

        }
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
    public function update(UpdateBookRequest $request, $id)
    {
        $response=UpdateBookAction::execute($id,$request);

        if($response)
        {

            return Success::execute('record Updated successfully',$response);
        }
        else{
            return Fail::execute('record Updated error',$response);


        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $response=DeleteBookAction::execute($id);

       if($response)
       {
           return Success::execute('record data deleted',$response);

       }
       else
       {
        return Fail::execute('record data deleted error',$response);

       }

    }
}
