<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Department;
use App\Models\User;
use App\Models\Status;
use App\Models\Task;
class UserController extends Controller
{

    function welcome(){
        if(auth()->check()){
            if(auth()->user()->role->code == "admin")  return redirect()->route("admin");
            return redirect()->route("auth");
        }
        return redirect()->route("home");

    }
    function progressCheck(Request $request, $id){
        $task = Task::find($id);
            $task->id_status = Status::where('code', 'progress')->first()->id;
            $task->save(); 
        return redirect()->route("auth");
    }
    function home(){
        return view("pages.home");
    }
    function login(){
        return view("pages.login");
    }
    function register(){
        return view("pages.register");
    }
    function loginAuth(Request $request){
        if(auth()->attempt([
"email" => $request->email, "password" => $request->password
        ])){
                if(auth()->user()->role->code == "admin")  return redirect()->route("admin");
                return redirect()->route("auth");
}
return redirect()->route("login")->withErrors(["loginerrors" => "Неверный формат"]);
    }
    function registerAuth(Request $request){
        $Validate = $request->validate([
            "email" => "required|unique:user"
        ],
        [
            "email.required" => "Неверный Формат",
            "email.unique" => "Неверный Формат",
        ]
        );
        $email = $request->email;
        $phone = $request->phone;
        $full_name = $request->full_name;
        $password = password_hash($request->password, PASSWORD_BCRYPT);
        $id_role = Role::where("code", "user")->first()->id;
        $id_department = Department::where("code", "sales")->first()->id;
        $auth = User::create(
            [
"id_role" => $id_role,
"id_department" => $id_department,
"password" => $password,
"full_name" => $full_name,
"phone" => $phone,
"email" => $email,
]
);
auth()->login($auth);
return redirect()->route("auth");
}
function auth(){
        if(auth()->user()->role->code == "admin")  return redirect()->route("admin");
    return view("auth.auth", ["tasks" => Task::get()]);
}
function logout(){
    auth()->logout();
    return redirect()->route("login");
}
}
