<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SiteSetting;

class SiteSettingController extends Controller
{
    public function index(SiteSetting $sitesetting){
        $sitesetting = $sitesetting->all();
        return view('admin.sitesetting.index', compact('sitesetting'));
    }
    
    
    public function store(Request $request,SiteSetting $sitesetting) {
        foreach (array_except($request->toArray(),['_token','submit']) as $key => $req){
           $sitesettingupdate = $sitesetting->where('namesetting',$key)->get()[0];
           if($sitesettingupdate->type != 3){
               $sitesettingupdate->fill(['value' => $req])->save();  
           }
            else { 
                $filename = uploadImages($req,'/public/website/slider/','1600','500', $sitesettingupdate->value);
                if($filename){
                   $sitesettingupdate->fill(['value' => $filename])->save(); 
                }
            }
          
        }
        return redirect()->back()->with('flash_message','site settings have Edidted successfully');
        
    }
}
