<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\HelpersFolder\ApiHelpers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderbook;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Actions\Order\StoreNewOrderAction;
use App\Actions\Order\GetAllOrderAction;
use App\Actions\Order\GetOrderByIdAction;
use App\Actions\Order\BookOrderAction;
use App\Actions\Order\GetOrderDeatilsAction;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
class OrderController extends Controller
{


    public function store(StoreOrderRequest $request)
    {
        $response=StoreNewOrderAction::execute($request);

        if($response)
        {
            return Success::execute('new_record_created',$response);

        }
        else
        {
            return Fail::execute('new_record_created error',$response);

        }


    }


    public function index()
    {
        $response=GetAllOrderAction::execute();
        if($response)
        {
            return Success::execute('get_data',$response);

        }
        else
        {
            return Fail::execute('get_data_error',$response);

        }
    }


    public function show($id)
    {
        $response=GetOrderByIdAction::execute($id);
        if($response)
        {
            return Success::execute('get_data',$response);

        }
        else
        {
            return Fail::execute('get_data_error',$response);

        }
    }

    public function orderdetails($orderid)
    {
        $response=GetOrderDeatilsAction::execute($orderid);
        if($response)
        {
            return Success::execute('get_data',$response);

        }
        else
        {
            return Fail::execute('get_data_error',$response);

        }


    }


    public function GetOrderBook($id)
    {
        $response=BookOrderAction::execute($id);

        if($response)
        {
            return Success::execute('get_data',$response);

        }
        else
        {
            return Fail::execute('get_data_erorr',$response);

        }
    }
}
