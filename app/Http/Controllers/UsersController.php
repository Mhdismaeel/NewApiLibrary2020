<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\HelpersFolder\ApiHelpers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderbook;
use App\Models\ResultModel;
use App\Actions\User\GetUserProfile;
use App\Actions\User\GetOrderForProfileUser;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
class UsersController extends Controller
{
   public function GetUserProfile()
   {
      $response=GetUserProfile::execute();
      if($response)
      {
          return Success::execute('get_data',$response);

      }
      else
      {
        return Fail::execute('get_data_error',$response);

      }

   }

   public function GetUserOrderProfile()
   {
       $response=GetOrderForProfileUser::execute();
       if($response)
       {
           return Success::execute('get_data',$response);

       }
       else
       {
        return Fail::execute('get_data_error',$response);

       }
   }

   public function GetUserOrder()
   {

    $userid=Auth::id();

    $myorder=array();

    $myorder=order::select('id')->where('userid','=',$userid)->get()->toArray();

    $dataset=[];

    $res=array();

    foreach($myorder as  $val)
    {

        $cv1=new ResultModel();

        $dataset=Orderbook::join('Books','Books.id','=','orderbooks.bookid')->
        join('orders','orders.id','=','orderbooks.orderid')->select('Books.title','Books.price')->
        where('orderbooks.orderid','=',$val)->get();

        $cv1=$val;

        $cv1['order_deatils']=[$dataset];

        $res[]=$cv1;



        }

    if($myorder)
        {
            $response=ApiHelpers::creaeApiResponse(false,200,'Get User Profile',$res);
            return response()->json($response,200);
        }
        else
        {
            $response=ApiHelpers::creaeApiResponse(false,400,'Not Found',$cv1);
            return response()->json($response,400);
        }


   }



}
