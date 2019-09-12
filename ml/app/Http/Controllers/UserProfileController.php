<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Hash;
use DB;

class UserProfileController extends Controller
{
        public function show(){
            return view('profile', array('user' => Auth::user()) );
        }

        public function update(Request $request){

            $input = $request->all();
            if(!empty($input['password']) && \Hash::check($input['oldpassword'], Auth::user()->password)){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                return redirect()->back()->with('message2', 'Su contrasena Actual no coincide. Datos errados.');
                   
            }

            // Logic for user upload of avatar
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
                $user = Auth::user();
                $user->avatar = $filename;
                
                $user->update($input);
                //$user->save();
            }
            $user = Auth::user();
            $user->update($input);
            //return view('profile', ['user' => Auth::user()] )
            return redirect()->back()->with('message', 'Sus datos fueron actualizados exitosamente.');
            ;


            
        }  
        
        public function amigos(){

            $amigos = DB::table('users')->select('users.id','users.name', 'users.username' ,'roles.name as role' ,'users.avatar' ,'users.token_mrl' , 'users.referred_by')
            ->join('model_has_roles', function ($join){
                $join->on('users.id', '=', 'model_has_roles.model_id');
            })
            ->join('roles', function ($join){
                $join->on('model_has_roles.role_id', '=', 'roles.id');
            })
            ->where('users.referred_by', '=', Auth::user()->id )
            ->get();

            return view('amigos')->with('amigos', $amigos);
        }
}
