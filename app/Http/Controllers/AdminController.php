<?php

namespace App\Http\Controllers;

use App\Bu;
use App\ContactUs;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(User $user,Bu $bu,ContactUs $contactUs){

        $bucountactive = countAllBuAppandtostatus(1);
        $buwaiting = countAllBuAppandtostatus(0);

        $usercount = $user->count();

        $contactUscount = $contactUs->count();

        $mapping = $bu->select('bu_latitude','bu_langtuide','bu_name')->get();
        $chart = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year' , date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();

        $array = [];
        if(isset($chart[0]['month'])) {
            for ($i = 1; $i < $chart[0]['month']; $i++) {

                $array[] = 0;
            }
        }
        $new = array_merge($array,$chart);

        $latestusers = $user->take('8')->orderBy('id','desc')->get();
        $Latestbu =  $bu->take('10')->orderBy('id','desc')->get();
        $Latestcontactus = $contactUs->take('7')->orderBy('id','desc')->get();



        return view('admin.home.index',
            compact(
                'bucountactive',
                'buwaiting',
                'usercount',
                'contactUscount','mapping','new','latestusers','Latestbu','Latestcontactus'
            ));
    }

    public function showYearstatistics(Bu $bu){

        $year = date('Y');
        $chart = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year' , date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();
        $array = [];
        if(isset($chart[0]['month'])){
            for($i =1; $i < $chart[0]['month']; $i++){
                $array[]=0;
            }
        }
        $new = array_merge($array,$chart);
        return view('admin.home.statistics',compact('year','new'));
    }

    public function showthisyear(Request $request,Bu $bu){

        $year = $request->year;
        $chart = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year',$year)->groupBy('month')->orderBy('month','asc')->get()->toArray();
        $array = [];
        if(isset($chart[0]['month'])) {
            for ($i = 1; $i < $chart[0]['month']; $i++) {

                $array[] = 0;
            }
        }
        $new = array_merge($array,$chart);
        return view('admin.home.statistics',compact('year','new'));
    }
}






