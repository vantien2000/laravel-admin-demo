<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Products::all();
        return View('Admin.products.index')->with(['products'=>(object)$products]);
    }

    public function insert(){
        $cats = Category::all();
        return View('Admin.products.create')->with(['cats'=>$cats]);
    }

    public function update($id){
        $product = Products::find($id);
        $cats = Category::all();
        return View('Admin.products.update',['product'=>$product,'cats'=>$cats]);
    }

    public function insert_product(Request $request){
        $product = new Products();
        $product->name = $request->name;
        $product->content = $request->content;
        $product->rate = $request->rate;
        $product->old_price = $request->old_price;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->image = '';
        //kiểm tra file đã upload chưa
        if(isset($_FILES['image'])){
                    
            if ($_FILES['image']['error'] > 0){
                return redirect('admin/add-product')->with('message','file image bị lỗi!');
            }
            else{
                // // //đưowngf dẫn đến thư mục chứa ảnh
                $path = './UI/assets/images/demos/demo-4/products'.$_FILES['image']['name'];
                //kiểm tra file tồn tại hay chưa
                if(file_exists($path)){
                    $product->image = $_FILES['image']['name'];
                }
                else{
                    //upload file vào thư mục lưu trữ
                    move_uploaded_file($_FILES['image']['tmp_name'],'./UI/assets/images/demos/demo-4/products'.$_FILES['image']['name']);
                    $product->image = $_FILES['image']['name'];
                }
                $product->save();
                return redirect('admin/add-product')->with('message','Thêm thành công!');
            }
        }
        else{
            $product->save();
            return redirect('admin/add-product')->with('message','Thêm thành công!'); 
        }
    }

    public function update_product(Request $request,$id){
        $product = Products::find($id);
        $product->name = $request->name;
        $product->content = $request->content;
        $product->rate = $request->rate;
        $product->old_price = $request->old_price;
        $product->price = $request->price;
        $product->category_id = $request->category;
        //kiểm tra file đã upload chưa
        if(isset($_FILES['image'])){        
            if ($_FILES['image']['error'] > 0){
                return redirect('admin/products/'.$id)->with('message','file image bị lỗi!');
            }
            else{
                // // //đưowngf dẫn đến thư mục chứa ảnh
                $path = './UI/assets/images/demos/demo-4/products'.$_FILES['image']['name'];
                //kiểm tra file tồn tại hay chưa
                if(file_exists($path)){
                    $product->image = $_FILES['image']['name'];
                }
                else{
                    //upload file vào thư mục lưu trữ
                    move_uploaded_file($_FILES['image']['tmp_name'],'./UI/assets/images/demos/demo-4/products'.$_FILES['image']['name']);
                    $product->image = $_FILES['image']['name'];
                }
                $product->save();
                return redirect('admin/products/'.$id)->with('message','Sửa thành công!');
            }
        }
        else{
            $product->save();
            return redirect('admin/products/'.$id)->with('message','Sửa thành công!'); 
        }
    }

    public function delete($id){
        if(!empty(Products::find($id))){
            Products::destroy($id);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
