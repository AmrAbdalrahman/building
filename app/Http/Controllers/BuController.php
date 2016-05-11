<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
Use App\Bu;
use Illuminate\Support\Facades\DB;
use Datatables;

class BuController extends Controller
{
    

    public function index(Request $request){

        $id = $request->id !== null ? '?user_id='.$request->id : null;

        return view('admin.bu.index',compact('id'));
    }
    
    public function create(){
       return view('admin.bu.add');
    }
    
    
    public function store(Requests\BuRequest $burequest,Bu $bu){

        
         if($burequest->file('image')){
          $filename = uploadImages($burequest->file('image'));
         if(!$filename){
            return redirect()->back()->with('flash_message','please choose another image less than 500*362');
         }
             $image = $filename;
        }  else {
            $image = '';
        }
        $user = Auth::user();
        $data= [
            'bu_name' => $burequest->bu_name,
            'bu_price' => $burequest->bu_price,
            'bu_rent' => $burequest->bu_rent,
            'bu_square' => $burequest->bu_square,
            'bu_type' => $burequest->bu_type,
            'bu_small_dis' => $burequest->bu_small_dis,
            'bu_meta' => $burequest->bu_meta,
            'bu_langtuide' => $burequest->bu_langtuide,
            'bu_latitude' => $burequest->bu_latitude,
            'bu_large_dis' => $burequest->bu_large_dis,
            'bu_status' => $burequest->bu_status,
            'user_id' =>$user->id,
            'rooms' => $burequest->rooms,
            'bu_place' => $burequest->bu_place,
            'image' => $image,
            'month' => date('m'),
            'year' => date('Y'),
        ];
        $bu->create($data);
        return redirect('/adminpanel/bu')->with('flash_message','New Building has Added successfully');
    }
    
    public function edit($id,User $user){
        $bu =  Bu::find($id);
        if($bu->user_id == 0){
                $user ='';
        }else{
            $user = $user->where('id',$bu->user_id)->get()[0];
        }

        return view('admin.bu.edit',compact('bu','user'));
    }
 
    public function update($id,Requests\BuRequest $request){
        $buupdate =  Bu::find($id);
        $buupdate->fill(array_except($request->all(),['image']))->save();
        if($request->file('image')){
         $filename = uploadImages($request->file('image'),'/public/website/bu_images/','500','362', $buupdate->image);
         if(!$filename){
            return redirect()->back()->with('flash_message','please choose another image less than 500*362');
         }
          $buupdate->fill(['image' => $filename])->save();
        }
         return redirect()->back()->with('flash_message','Building Editing has done successfully');  
    }
    
    
    public function destroy($id){
        Bu::find($id)->delete();
        return redirect()->back()->with('flash_message','Building  has deleted successfully');
    }

    
    public function anydata(Request $request,Bu $bu) {

        if($request->user_id){
            $bus = $bu->where('user_id',$request->user_id)->get();
        }else{
            $bus = $bu->all();
        }
        return Datatables::of($bus)
             ->editColumn('bu_name',  function ($model){
                  return '<a href="'.url('/adminpanel/bu/'.$model->id.'/edit').'">'.$model->bu_name.'</a>';
                })
                ->editColumn('bu_type',  function ($model){
                    $type = bu_type();
                    return '<span class="badge badge-info">'.$type[$model->bu_type].'</span>';
                })
                ->editColumn('bu_status',  function ($model){
                    return $model->bu_status == 0 ? '<span class="badge badge-info">'.'Detactive'.'</span>' : '<span class="badge badge-warning">'.'Active'.'</span>' ;
                })
                ->editColumn('control',  function ($model){
                    $all = '<a href="'.url('/adminpanel/bu/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                    $all .= '<a href="'.url('/adminpanel/bu/'.$model->id.'/delete').'" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
                    

                    return $all;
                })
                ->make(true);
                
    }
    
    public function showAllEnable(Bu $bu) {
        $buAll = $bu->where('bu_status',1)->orderBy('id','desc')->paginate(15);
       // dd($buAll);
        return view('website.bu.all',  compact('buAll'));
    }
    
    public function forRent(Bu $bu) {
        $buAll = $bu->where('bu_status',1)->where('bu_rent',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',  compact('buAll'));
    }
    public function forBuy(Bu $bu) {
        $buAll = $bu->where('bu_status',1)->where('bu_rent',0)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',  compact('buAll'));
    }
    
   
    public function showByType($type,Bu $bu) {
        if(in_array($type,['0','1','2'])){
            $buAll = $bu->where('bu_status',1)->where('bu_type',$type)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',  compact('buAll'));
        }  else {
            return redirect()->back();
        }
        
    }
    
    public function search(Request $request,Bu $bu) {
       
        $requestAll = array_except($request->toArray(),['submit','_token','page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $count = count($requestAll);
        $i = 0;
        
        foreach ($requestAll as $key => $req){
            $i++;
            if($req != ''){
               if($key == 'bu_price_from' && $request->bu_price_to == '' ){
                    $query->where('bu_price','>=',$req);
                }elseif ($key == 'bu_price_to' && $request->bu_price_from == '') {
                    $query->where('bu_price','<=',$req);
                }  else {
                    if( $key != 'bu_price_to' && $key != 'bu_price_from'){
                       $query->where($key,$req); 
                    } 
                } 
                $array[$key] = $req;
            } elseif ($count == $i && $request->bu_price_to != ''  && $request->bu_price_from != '') {
                $query->whereBetween('bu_price',[$request->bu_price_from,$request->bu_price_to]);
                $array[$key] = $req;
        }    
        }
        $buAll =$query->paginate(15);
        return view('website.bu.all',  compact('buAll','array'));
        
    }
    public function showSingle($id ,BU $bu){
     
        $buInfo = $bu->findOrFail($id);
        if($buInfo->bu_status == 0){
            $messageTitle = "Pending Acceptance Administrator";
            $messagebody = "$buInfo->bu_name   Building
                            The building has us but wait for accept by Administrator during 24 hours then publish the building";
            return view('website.bu.noper',  compact('buInfo','messageTitle','messagebody'));
        }
        $same_rent = $bu->where('bu_rent','$buInfo->bu_rent')->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = $bu->where('bu_type','$buInfo->bu_rent')->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.bu.buinfo',  compact('buInfo','same_rent','same_type'));
    }
    
    public function getAjaxInfo(Request $request,Bu $bu){
        
        return $bu->find($request->id)->toJson();
    }

    public function userAddview()
    {
        return view('website.userbu.useradd');
    }

    public function userstore(Requests\BuRequest $burequest, Bu $bu){
        if($burequest->file('image')){
            $filename = uploadImages($burequest->file('image'));
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $image = $filename;
        }  else {
            $image = '';
        }

        $user = Auth::user() ? Auth::user()->id : 0 ;
        $data= [
            'bu_name' => $burequest->bu_name,
            'bu_price' => $burequest->bu_price,
            'bu_rent' => $burequest->bu_rent,
            'bu_square' => $burequest->bu_square,
            'bu_type' => $burequest->bu_type,
            'bu_small_dis' => strip_tags(str_limit($burequest->bu_large_dis,160)) ,
            'bu_meta' => $burequest->bu_meta,
            'bu_langtuide' => $burequest->bu_langtuide,
            'bu_latitude' => $burequest->bu_latitude,
            'bu_large_dis' => $burequest->bu_large_dis,

            'user_id' =>$user,
            'rooms' => $burequest->rooms,
            'bu_place' => $burequest->bu_place,
            'image' => $image,
            'month' => date('m'),
            'year' => date('Y'),

        ];
        $bu->create($data);
        return view('website.userbu.done');
    }

    public function showuserBuilding(Bu $bu){
        $user = Auth::user();
        $bu = $bu->where('user_id',$user->id)->where('bu_status',1)->paginate(10);
        return view('website.userbu.showuserbu',compact('bu','user'));
    }


    public function buildingshowwaiting(Bu $bu){
        $user = Auth::user();
        $bu = $bu->where('user_id',$user->id)->where('bu_status',0)->paginate(10);
        return view('website.userbu.showuserbu',compact('bu','user'));
    }

    public function userEditBuilding($id ,Bu $bu){

        $user = Auth::user();
        $buInfo = $bu->find($id);

        if($user->id != $buInfo->user_id){
            $messageTitle = "This building isnt you added this building.";
            $messagebody = "$buInfo->bu_name   Building
                            cant add with other membership";
            return view('website.bu.noper',  compact('buInfo','messageTitle','messagebody'));

        }elseif ($buInfo->bu_status == 1){

            $messageTitle = "This building is Activated";
            $messagebody = "$buInfo->bu_name   Building
                            is Activated you cant edit on this building if you want edit on this building please go to contact us 
                            and send message with request of editing";
            return view('website.bu.noper',  compact('buInfo','messageTitle','messagebody'));
        }
        $bu = $buInfo;

       return view('website.userbu.edituserbu',compact('bu','user'));
    }

    public function userUpdateBuilding(Requests\BuRequest $request ,Bu $bu )
    {
        $buupdate = $bu->find($request->bu_id);

        $buupdate->fill(array_except($request->all() , ['image']))->save();
        if($request->file('image')){
            $filename = uploadImages($request->file('image'),'/public/website/bu_images/','500','362', $buupdate->image);
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $buupdate->fill(['image' => $filename])->save();
        }
        return redirect()->back()->with('flash_message','Building has edited successfully');
    }

    public  function changestatus($id ,$status,Bu $bu){
        $buupdate = $bu->find($id);
        
        $buupdate->fill(['bu_status' => $status])->save();

        return redirect()->back()->with('flash_message','Building status has changed successfully');
    }


}
