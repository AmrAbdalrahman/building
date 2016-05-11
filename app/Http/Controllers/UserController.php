<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Auth;
use Datatables;
Use App\Bu;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        
      //  $user = $user->all();
        return view('admin.user.index');
    }
    public function create(){
        
        return view('admin.user.add');
    }
     public function store(AddUserRequestAdmin $request,User $user)
    {
         $user = new User;
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->password = bcrypt($request->input('password'));
         //$user->admin = 1;
         $user->save();

    
        return redirect('/adminpanel/users')->with('flash_message','New Member has Added successfully');
    }
    public function edit($id , User $user,Bu $bu){

        $user = $user->find($id);
        $buwaiting = $bu->where('user_id',$id)->where('bu_status',0)->paginate(10);
        $buenable = $bu->where('user_id',$id)->where('bu_status',1)->paginate(10);

        return view('admin.user.edit',compact('user','buwaiting','buenable'));
    }
    
    public function update($id ,User $user,Request $request){
        $userUpdated = $user->find($id);
        $userUpdated->fill($request->all())->save();
       // return redirect()->back()->withFlashMessage(' Member has Edidted successfully');
        return redirect()->back()->with('flash_message',' Member has Edidted successfully');
    }
    
    public function UpdatePassword(User $user,Request $request) {
        $userUpdated = $user->find($request->user_id);
       // dd($userUpdated);
        $password = bcrypt($request->password);
        //dd($password);
        $userUpdated->fill(['password'=>$password])->save();
      //  return redirect()->back()->withFlashMessage('changed password successfully');
        return redirect()->back()->with('flash_message','changed password successfully');
    }
    
    public function destroy($id ,User $user) {
        if($id != 1){
          $user->find($id)->delete();
          Bu::where('user_id',$id)->delete();
     //   return redirect('/adminpanel/users')->withFlashMessage(' Member has Deleted successfully'); 
        return redirect('/adminpanel/users')->with('flash_message',' Member has Deleted successfully');
        }
      //  return redirect('/adminpanel/users')->withFlashMessage('cant delete first membership'); 
        return redirect('/adminpanel/users')->with('cant delete first membership');
    }
    
   
    public function anydata(User $user) {
        $users = $user->all();
       // $users =User::all();
        return Datatables::of($users)
             ->editColumn('name',  function ($model){
                  return '<a href="'.url('/adminpanel/users/'.$model->id.'/edit').'">'.$model->name.'</a>';
                })
                ->editColumn('admin',  function ($model){
                    return $model->admin == 0 ? '<span class="badge badge-info">'.'Member'.'</span>' : '<span class="badge badge-warning">'.'Administrator'.'</span>' ;
                })


                 ->editColumn('mybu',  function ($model){
                     return '<a href="'.url('/adminpanel/bu/'.$model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"> </i>  </span> </a>';                  })

                ->editColumn('control',  function ($model){
                    $all = '<a href="'.url('/adminpanel/users/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                    if($model->id != 1){
                    $all .= '<a href="'.url('/adminpanel/users/'.$model->id.'/delete').'" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
                    
                }
                    return $all;
                })
                ->make(true);
                
    }

    public function usereditInfo(){

        $user = Auth::user();
        return view('website.profile.edit',compact('user'));
    }

    public function userupdateprofile(Requests\UserUpdateRequest $request,User $users)
    {
        $user = Auth::user();
        if($request->email != $user->email){
            $checkemail = $users->where('email',$request->email)->count();
            if($checkemail == 0){

                $user->fill($request->all())->save();
            }else{
                return redirect()->back()->with('flash_message','This email is used before please use another email');
            }
        }
        else{
            $user->fill(['name' => $request->name])->save();
        }
        return redirect()->back()->with('flash_message','Information has edited  successfully');
    }

    public function changepassword(Requests\UserUpdatePassword $request,User $users){
        $user = Auth::user();
        if(Hash::check($request->password , $user->password)){

            $hash =  Hash::make($request->newpassword);
            $user->fill(['password' => $hash])->save();

            return redirect()->back()->with('flash_message','password changed successfully');

        }else{
            return redirect()->back()->with('flash_message','Old Password is incorrect');
        }
    }
}
