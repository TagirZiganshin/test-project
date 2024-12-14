<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Category;
use App\Models\Task;
class AdminController extends Controller
{
    function admin(){
        return view("admin.admin", ["tasks" => Task::get(), "statuses" => Status::all()]);
    }
    function adminPanel(){
        return view("admin.admin-panel");
    }
    function adminPanelUpdate(Request $request, $id){
       $task = Task::find($id);
       $task->id_status = $request->input("status");
       $task->save();
       return redirect()->route("admin");
    }
    function adminPanelCreate(Request $request){
        if($request->hasFile("image")){
            $Nameimage = time() . "." . $request->image->extension();     
            $request->image->move(public_path("uploads"), $Nameimage);
            $description = $request->description;
            $id_user = auth()->user()->id;
            $id_category = Category::where("name", "Пример категории")->first()->id;
            $id_status = Status::where("code", "new")->first()->id;
            Task::create([
"id_user" => $id_user,
"id_category" => $id_category,
"id_status" => $id_status,
"description" => $description,
"image" => $Nameimage,
            ]);
            return redirect()->route("admin");
        }
    }
}
