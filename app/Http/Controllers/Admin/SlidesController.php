<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RulesSlide;
use App\Models\Slides;

class SlidesController extends Controller
{
    public function index(){
        $slides = Slides::all();
        return View('Admin.slides.index')->with(['slides'=>$slides]);
    }

    public function insert(){
        return View('Admin.slides.create');
    }

    public function update($id){
        $slide = Slides::find($id);
        return View('Admin.slides.update',['slide'=>$slide]);
    }

    public function insert_slide(Request $request){
        if($request->isMethod('post')){
            $validator = new RulesSlide();
            $slide = new Slides();
            $slide->subtitle = $request->input('subtitle');
            $slide->title = $request->input('title');
            $slide->old_price= $request->input('old_price');
            $slide->new_price= $request->input('new_price');
            if(empty($validator->rules())){
                return redirect('admin/add-slide')->withInput()->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['background'])){
                    
                    if ($_FILES['background']['error'] > 0){
                        return redirect('admin/add-slide')->with('message','file image bị lỗi!');
                    }
                    else{
                        // // //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './UI/assets/images/demos/demo-4/slider'.$_FILES['background']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $slide->background = $_FILES['background']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['background']['tmp_name'],'./UI/assets/images/demos/demo-4/slider'.$_FILES['background']['name']);
                            $slide->background = $_FILES['background']['name'];
                        }
                        $slide->save();
                        return redirect('admin/add-slide')->with('message','Thêm thành công!');
                    }
                }
                else{
                    $slide->save();
                    return redirect('admin/slides/'.$id)->with('message','Sửa thành công!'); 
                }
            }
        }
       
    }

    public function update_slide(Request $request,$id){
        if($request->isMethod('post')){
            //check lỗi nhập liệu
            $validator = new RulesSlide();
            $slide = Slides::find($id);
            $slide->subtitle = $request->input('subtitle');
            $slide->title = $request->input('title');
            $slide->old_price= $request->input('old_price');
            $slide->new_price= $request->input('new_price');
            if(empty($validator->rules())){
                return redirect('admin/slides/'.$id)->withInput()->withErrors($validator->messages());
            }
            else{
                //kiểm tra file đã upload chưa
                if(isset($_FILES['background'])){
                    if ($_FILES['background']['error'] > 0){
                        return redirect()->back()->with('message','file image bị lỗi!');
                    }
                    else{
                        //đưowngf dẫn đến thư mục chứa ảnh
                        $path = './UI/assets/images/demos/demo-4/slider'.$_FILES['background']['name'];
                        //kiểm tra file tồn tại hay chưa
                        if(file_exists($path)){
                            $slide->background = $_FILES['background']['name'];
                        }
                        else{
                            //upload file vào thư mục lưu trữ
                            move_uploaded_file($_FILES['background']['tmp_name'], './UI/assets/images/demos/demo-4/slider'.$_FILES['avatar']['name']);
                            $slide->background = $_FILES['background']['name'];
                        }
                        
                        $slide->save();
                        return redirect()->back()->with('message','Sửa thành công!');
                    }
                }else{
                    $slide->save();
                    return redirect()->back()->with('message','Sửa thành công!');
                }
            }
        }
       
    }

    public function delete($id){
        if(!empty(Slides::find($id))){
            Slides::destroy($id);
            return redirect('admin/slides');
        }
        return redirect('admin/slides');
    }
}
