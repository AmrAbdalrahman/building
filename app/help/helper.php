<?php

function getSetting($settingname = 'sitename'){
    
    return App\SiteSetting::where('namesetting',$settingname)->get()[0]->value;
}

function checkIfImagesIsExit($imagename , $pathImage = '/public/website/bu_images/',$url = '/website/bu_images/'){
    
    
    if($imagename != ''){
        
        $path = base_path().$pathImage.$imagename;
        if(file_exists($path)){
        return Request::root().$url.$imagename;   
    }
    }else {
        return getSetting('no_image'); 
    }  
}

 function uploadImages($request,$path = '/public/website/bu_images/',$width = '500',$height = '362',$deletefilrname = '' ){
     if($deletefilrname !=''){
         deleteImage(base_path().$path.'/'.$deletefilrname);

     }
          $dim = getimagesize($request);
       //  dd($request);
          $filename = $request->getClientOriginalName();
          $request->move(
                  base_path().$path, $filename
                  );
          if($width == 500 && $height == 362){
              $thumpath =  base_path().'/public/website/thum/';
           
              $thumpathnew = $thumpath.$filename;
              Intervention\Image\Facades\Image::make(base_path().$path.'/'.$filename)->resize('500','362')->save($thumpathnew,100);
              if($deletefilrname !=''){
             deleteImage($thumpath.$deletefilrname);
              
          }
              
          }

              
          return $filename;
 }

 
 function deleteImage($deletefilrname){
     if(file_exists($deletefilrname)){
                  \Illuminate\Support\Facades\File::delete($deletefilrname);
              }
 }


function bu_type(){
    $array = [
        'flat',
        'villa',
        'chalet'
    ];
    return $array;
}



function buforusercount($user_id, $status){

    return \App\Bu::where('bu_status',$status)->where('user_id',$user_id)->count();

}

function countAllBuAppandtostatus($status){

    return \App\Bu::where('bu_status',$status)->count();
}

function setActive($array, $class = "active"){
    if(!empty($array)){
        $seg_array = [];
        foreach ($array as $key => $url){
            if(Request::segment($key+1) == $url){
                $seg_array[] = $key;
            }
        }

        if(count($seg_array) == count(Request::segments())){
            if(isset($seg_array[0])){
                return $class;
            }

        }
    }

}
function bu_rent(){
    $array = [
        'ownership',
        'rent'
    ];
    return $array;
}
 function contact(){
    return [
        '1' =>'Like',
        '2' =>'Problem',
        '3' =>'Suggestion',
        '4' =>'Explanation',

    ];
}
function bu_status(){
    $array = [
        'Detactive',
        'Active'
        
    ];
    return $array;
}
function roomnumber(){
    $array=[];
    for($i=2;$i <= 40;$i++){
        $array[$i]=$i;
        
    }
    return $array;
}
function searchnamefield(){
    return [
        'bu_price' => 'Building price', 
        'bu_place' => 'Building Area',
        'rooms' => 'Roms number',
        'bu_type' => 'Building Type',
        'bu_rent' => 'Operation Kind',
        'bu_square' => 'Square',
        'bu_price_to' => 'Price to',
        'bu_price_from' => 'Price from',
        
    ];
}
function unreadmassage(){

    return \App\ContactUs::where('view',0)->get();
}

function countunreadmassage(){

    return \App\ContactUs::where('view',0)->count();
}
function bu_place(){
    return [
       "c-56" => "cairo",
        "c-57" => "Alexandria",
        "c-58" => "Aswan",
        "c-59" => "Helwan",
        "c-60" => "marsa matroh",
        "c-61" => "fayom"
    ];
}