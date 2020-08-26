<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function register()
    {
      // dd($role);
      return view('register');
    }

    public function postregister(Request $request)
    {
      // dd($request->all());
      $this->validate($request, [
        'name' => 'required|min:4',
        'emp_id' => 'required|numeric'
      ]);
      User::create([
        'name' => $request->name,
        'emp_id' => $request->emp_id,
        'type' => $request->type,
        'user_id' => Auth::user()->emp_id
      ]);
      // return redirect()->back();
      return back()->with('success', 'เพิ่มผู้ใช้แล้ว');
    }
    public function login()
    {
      return view('login');
    }
    public function postlogin(Request $request)
    {
      // $this->validate($request,[
      //    'emp_id'=>'required|numeric',
      //    'password'=>'required'
      // ]);
      // if(!\Auth::attempt(['emp_id' => $request->emp_id,'password'=> $request->password])){
      //   return redirect()->back();
      // }
      // return redirect()->route('home');

      $this->validate($request,[
         'emp_id'=>'required|numeric',
         'password'=>'required'
      ]);
      // ตรวจสอบว่ามีสิทธิ์เข้ามาใช้งานหรือไม่ เช็คจากตารางuserของเราเอง
      $user = User::where('emp_id',$request->emp_id)->first();
      // dd($user);
      if(!empty($user)){
        // ดึง service จาก ad
        $Controller = new UserController();
        // $urlApi = 'http://192.168.242.164:8010/testservice/services/getservice.php';
        $urlApi = 'http://catdev.cattelecom.com/testservice/services/getservice.php';
        $data_array =  array(
          "ClientKey" => '',
          "ServiceName" => 'AuthenUser',
          "ServiceParams" => array(
                  "emp_code" => $request->emp_id,
                  "pw" => $request->password,
                  ),
          );
// dd($data_array);
        $make_call =  $Controller->callAPI('POST', $urlApi, json_encode($data_array));
        // dd($make_call);
        // $key = json_decode($make_call, true);
// dd($make_call);
        if($make_call  == 'bad request'){
          return redirect()->back()->with('message', 'กรุณาloginใหม่อีกครั้ง'); //user timeout
        }
        $response = json_decode($make_call, true);

        if($response['Result'] == 'Pass'){
          \Auth::login($user);
          return redirect()->route('dashboard'); // รหัส login ผ่าน
        }else{
          return redirect()->back()->with('message', 'รหัสผ่านไม่ถูกต้อง'); //รหัสผิด
        }
      }else{
        return redirect()->back()->with('message', 'คุณไม่มีสิทธิ์เข้าใช้งานระบบนี้'); //ไม่มีสิทธิ์
      }
    }

    public static function callAPI($method, $url, $data){
      $curl = curl_init();

      switch ($method){
         case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
         case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
         default:
            if ($data)
               $url = sprintf("%s?%s", $url, http_build_query($data));
      }

      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'APIKEY: 111111111111111111111',
         'Content-Type: application/json',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

      // EXECUTE:
      $result = curl_exec($curl);
      // $key = json_decode($result);
      // dd($dd->ClientKey);
      if(!$result){
        die("Connection Failure");
      }

      curl_close($curl);
      return $result;
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }

    public function list_user()
    {
      $list = User::get();
      $role = Func::get_role_all();
      return view('list_user',['list' => $list,'roles' => $role]);
    }

    public function edit_user(Request $request)
    {
      // dd($request->emp_id);
      $this->validate($request, [
        'name' => 'required|min:4',
        'emp_id' => 'required|numeric',
        'field' => 'required',
        'office' => 'required',
        'part' => 'required',
        'type' => 'required',
        'center_money' => 'required',
        'tel' => 'required|numeric'
      ]);

      $update = User::find($request->id);
      $update->name = $request->name;
      $update->emp_id = $request->emp_id;
      $update->field = $request->field;
      $update->office = $request->office;
      $update->part = $request->part;
      $update->center_money = $request->center_money;
      $update->type = $request->type;
      $update->tel = $request->tel;
      $update->update();

      if($update){
        return back()->with('success', 'Update Successful');
      }
      return back()->with('success', 'Update Successful');
    }

    public function delete_user(Request $request)
    {
      $delete = User::find($request->id);
      $delete->delete();
      if($delete){
        return back()->with('success', 'Delete Successful');
      }
      // return back()->with('success', 'Delete Successful');
    }
}
