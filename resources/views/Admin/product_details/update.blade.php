@extends('Admin.layout.dashboard')
@section('section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Update User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- form start -->
              <form pjax-container action="{{ asset('admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input name="name" type="text" class="form-control" value="{{ $product->name }}" placeholder="Enter username">
                  </div>
                    @foreach ($errors->get('name') as $error)
                      <div class="text text-danger">
                        {{ $error }}
                      </div>
                    @endforeach
                <div class="form-group">
                  <label for="exampleInputEmail1">Content</label><br/>
                  <textarea value="" name="content" id="summernote" cols="30" rows="10">{{ $product->content}}</textarea>
                </div>
                  @foreach ($errors->get('content') as $error)
                    <div class="text text-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="image" id="file" type="file" onchange="load_image(event)">
                          
                    </div>
                  </div>
                  @foreach ($errors->get('image') as $error)
                    <div class="text text-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                </div>
                <img id="output" src="{{ asset('UI/assets/images/demos/demo-4/products/'.$product->image) }}" />
                <div class="form-group">
                  <label for="exampleInputPassword1">Rate</label>
                  <input name="rate" value="{{ $product->rate }}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter text" required>
                </div>
                @foreach ($errors->get('rate') as $error)
                  <div class="text text-danger">
                    {{ $error }}
                  </div>
                @endforeach
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Price</label>
                  <input name="old_price" type="number" value="{{ $product->old_price }}" class="form-control" id="exampleInputPassword1" placeholder="Enter text" required>
                </div>
                @foreach ($errors->get('old_price') as $error)
                  <div class="text text-danger">
                    {{ $error }}
                  </div>
                @endforeach
                <div class="form-group">
                  <label for="exampleInputPassword1">Price</label>
                  <input name="price" type="number" value="{{ $product->price }}" class="form-control" id="exampleInputPassword1" placeholder="Enter text" required>
                </div>
                @foreach ($errors->get('price') as $error)
                  <div class="text text-danger">
                    {{ $error }}
                  </div>
                @endforeach
                <div class="form-group">
                  <label for="">Category</label>
                  <select class="form-control" name="category" id="">
                    @foreach ($cats as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>
                @foreach ($errors->get('category') as $error)
                  <div class="text text-danger">
                    {{ $error }}
                  </div>
                @endforeach
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" id="btn-update" class="btn btn-primary">Update</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop