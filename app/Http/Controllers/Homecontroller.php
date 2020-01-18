<?php

namespace App\Http\Controllers;



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    //  Index Page
    public function index(){
        return view('index');
    }
    // SHOW REGISTER
    public function showregister(){
        return view('register');
    }
    // LOGIN SHOW
    public function showlogin(){
        return view('login');
    }
    // REGISTER
    public function doregister(Request $request){

        // REGISTER FORM VALIDATION
        $request->validate([
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'mobile'=>'required|string|min:1|max:10',
            'email'=> 'required|string|email|max:191|unique:users',
            'password'=>'required|string|min:6',
             ]);

            
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $mobile = $request->input('mobile');
            $email = $request->input('email');
            $password = $request->input('password');
            $token=sha1(time());
            print_r($first_name);
          
           $data=array('first_name'=>$first_name,"last_name"=>$last_name,"mobile"=>$mobile,"email"=>$email,"password"=>$password,"token"=>$token);
        print_r($data);
        die();
        if($data > 0)
        {
        $insert=DB::table('user')->insert($data);
         $post = array("S"=>"1", "message"=>"Success", 'id'=>$insert);

        }
        else{
            $post = array('S'=>"0", "message"=>"Missing parameter");
        }
                return response()->json([$post], 201);
        }
        // Do LOGIN SHOW
       public function dologin(Request $request){
        $request->validate([
            'email'=> 'required|string|email|max:191|unique:users',
            'password'=>'required|string|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $data=array('email'=>$email,'password'=>$password);
        if($data>0)
        {
            $users = DB::table('user')->get();
            $post = array('S'=>"1", "token"=>$users[0]);

        }
        else{
            $post = array("S"=>"2", "message"=>"Invalid Login ID or Password");
        }
          echo json_encode($post);
       }
      // SHOW CATEGORY
      public function showcategory(){
        return view('category');
      }

      // SHOW PRODUCT DETAILS

      public function showdetails(){
          return view('details');
      }

      public function show_product(){

        $users = DB::table('tbl_product')->get();
        $post = array('S'=>"1", "products"=>$users[0]);
        echo json_encode($post);
      }

      // SHOW CHECKOUT 

      public function show_checkout(){
         return view('checkout');
      }



}
