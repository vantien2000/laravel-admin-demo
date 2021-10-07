<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RulesUser;
use App\Models\Users;

class UserController extends Controller
{
    public function index(){
        $users = Users::paginate(3);
        return View('users.index',['users'=>$users]);
    }

    public function update($id){
        $user = Users::find($id);
        return View('users.update',['user'=>$user]);
    }

    public function insert(){
        return View('users.create');
    }

    public function insert_user(Request $request){
        if($request->isMethod('post')){
            $validator = new RulesUser();
            if(empty($validator->rules())){
                return redirect('/add-user')->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['avatar'])){
                    if ($_FILES['avatar']['error'] > 0){
                        return redirect('/add-user')->with('message','file image bị lỗi!');
                    }
                    else{
                        $user = new Users();
                        $user->name = $request->input('name');
                        $user->email = $request->input('email');
                        $user->password = bcrypt($request->input('password'));

                        // $user->avatar = '';
                        //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './admin/dist/img/'.$_FILES['avatar']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $user->avatar = $_FILES['avatar']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['avatar']['tmp_name'], './admin/dist/img/'.$_FILES['avatar']['name']);
                            $user->avatar = $_FILES['avatar']['name'];
                        }
                        $user->remember_token = bcrypt(0);
                        $user->save();
                        return redirect('/add-user')->with('messange','Thêm thành công!');
                        
                    }
                }
            }
        }
       
    }

    public function update_user(Request $request,$id){
        if($request->isMethod('post')){
            //check lỗi nhập liệu
            $validator = new RulesUser();
            if(empty($validator->rules())){
                return redirect()->back()->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['avatar'])){
                    if ($_FILES['avatar']['error'] > 0){
                        return redirect()->back();
                    }
                    else{
                        $user = Users::find($id);
                        $user->name = $request->input('name');
                        $user->email = $request->input('email');
                        $user->password = bcrypt($request->input('password'));

                        //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './admin/dist/img/'.$_FILES['avatar']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $user->avatar = $_FILES['avatar']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['avatar']['tmp_name'], './admin/dist/img/'.$_FILES['avatar']['name']);
                            $user->avatar = $_FILES['avatar']['name'];
                        }
                        $user->remember_token = bcrypt(0);
                        $user->save();
                        return redirect()->back();
                    }
                }
            }
        }
       
    }

    public function delete($id){
        if(!empty(Users::find($id))){
            Users::destroy($id);
            return redirect()->back();
        }
        return redirect()->back();
    }

}
