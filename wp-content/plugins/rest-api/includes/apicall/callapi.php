<?php 
class CallApi{

    public function userRegisterCall($request){
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $confirmpassword = $request['confirmpassword'];
        if($username == ''){
            return [
                'status' =>  false,
                'code'   =>   '101',
                'Message' => 'Username is required'
            ];
        }
        if($email ==""){
            return [
                'status' =>  false,
                'code'   =>   '101',
                'Message' => 'Email is required'
            ];
        }
        if($password ==""){
            return [
                'status' =>  false,
                'code'   =>   '101',
                'Message' => 'Password is required'
            ];
        }
        if($confirmpassword ==""){
            return [
                'status' =>  false,
                'code'   =>   '101',
                'Message' => 'Confirm Password is required'
            ];
        }
      }
     

}