<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;
use Cookie;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Favourite;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str; 

class HospitalController extends Controller
{
    public function login() {
        if(Session::get('patient_id'))
        {            
            return redirect()->route('home');
        }
        else {
            return view('loginPatient');
        }
    }
    public function home() {        
        return view('homePage');
    }
    public function loginPost(Request $req){ 
        $result = User::where(['user_name' => $req->input('user_name')])->get();
        $res = json_decode($result,true);
        if(sizeof($res)==0){
            return redirect()->route('login');
        }
        else {
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if($decrypted_password==$req->input('password')){
                $token = Str::random(6);
                $req->session()->put('patient_id',$token);
                $result = User::where("user_name", $req->input('user_name'))->update(["access_token" => $token]);
                return redirect('/');
            }
            else {
                return redirect('/login');
            }
        }
    }
    public function doctors() {  
        $data['doctors'] =  Doctor::orderByDesc('id')->with('speciality','fav')->get();
        //print_r(json_decode($data['doctors']));
        return view('doctors')->with($data);
    }
    public function favoites() {  
        $data['doctors'] =  Favourite::orderByDesc('id')->with('doctor')->get();
        //print_r(json_decode($data['doctors']));
        return view('favoites')->with($data);
    }
    public function statusUpdate(Request $request)

    {

        $id = $request->route('id');
        $status = $request['status'];
        $patient_id = Session::get('patient_id');
        $user = User::where(['access_token'=>$patient_id])->get();
        $userId = $user[0]->id;

        if($status) {
            $user = new Favourite;
            $user->doctor_id = $id;
            $user->user_id = $userId;
            $user->save();
        }
        else {
            Favourite::where(['doctor_id'=>$id, 'user_id'=>$userId])->delete();
        }

    }
    public function logout(Request $req){ 
        $patient_id = Session::get('patient_id'); 
        $result = User::where("access_token", $patient_id)->update(["access_token" => NULL]);
        $req->session()->flush();
        $req->session()->regenerate();
        return redirect()->route('login');
    }
}
