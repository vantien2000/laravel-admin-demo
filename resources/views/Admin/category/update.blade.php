@extends('Admin.layout.dashboard')
@section('section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Category</li>
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
              <form pjax-container action="{{ asset('admin/update-category/'.$cat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name Category</label>
                    <input name="name" type="text" class="form-control" value="{{ $cat->name }}" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image Category</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image" id="file" type="file" onchange="load_image(event)">
                      </div>
                      
                    </div>
                  </div>
                  <img id="output" src="{{ asset('UI/assets/images/demos/demo-4/cats/'.$cat->image) }}" />
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" data-id="{{ $cat->id }}" class="btn sbm btn-primary">Update</button>
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