<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RulesCategory;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $cat = Category::all();
        return View('Admin.category.index')->with(['categories'=>$cat]);
    }

    public function insert(){
        return View('Admin.category.create');
    }

    public function update($id){
        $cat = Category::find($id);
        return View('Admin.category.update',['cat'=>$cat]);
    }

    public function insert_category(Request $request){
        if($request->isMethod('post')){
            $validator = new RulesCategory();
            $cat = new Category();
            $cat->name = $request->input('name');
            if(empty($validator->rules())){
                return redirect('admin/add-category')->withInput()->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['image'])){
                    
                    if ($_FILES['image']['error'] > 0){
                        return redirect('admin/add-category')->with('message','file image bị lỗi!');
                    }
                    else{
                        // // //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './UI/assets/images/demos/demo-4/cats'.$_FILES['image']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $cat->image = $_FILES['image']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['image']['tmp_name'],'./UI/assets/images/demos/demo-4/cats'.$_FILES['image']['name']);
                            $cat->image = $_FILES['image']['name'];
                        }
                        $cat->save();
                        return redirect('admin/add-category')->with('message','Thêm thành công!');
                    }
                }
                else{
                    $cat->save();
                    return redirect('admin/add-category')->with('message','Sửa thành công!'); 
                }
            }
            
        }
       
    }

    public function update_category(Request $request,$id){
        if($request->isMethod('post')){
            //check lỗi nhập liệu
            $validator = new RulesCategory();
            $cat = Category::find($id);
            $cat->name = $request->input('name');
            if(empty($validator->rules())){
                return redirect('admin/categories/'.$id)->withInput()->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['image'])){
                    if ($_FILES['image']['error'] > 0){
                        return redirect()->back()->with('message','file image bị lỗi!');
                    }
                    else{
                        //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './UI/assets/images/demos/demo-4/cats'.$_FILES['image']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $cat->image = $_FILES['image']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['image']['tmp_name'], './UI/assets/images/demos/demo-4/cats'.$_FILES['image']['name']);
                            $cat->image = $_FILES['image']['name'];
                        }
                        
                        $cat->save();
                        return redirect()->back()->with('message','Sửa thành công!');
                    }
                }else{
                    $cat->save();
                    return redirect()->back()->with('message','Sửa thành công!');
                }
            }
        }
       
    }

    public function delete($id){
        if(!empty(Category::find($id))){
            Category::destroy($id);
            return redirect('admin/categories');
        }
        return redirect('admin/categories');
    }
}
