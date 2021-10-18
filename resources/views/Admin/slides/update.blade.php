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
              <form pjax-container action="{{ url('admin/update-slide/'.$slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subtitle</label>
                    <input name="subtitle" type="text" class="form-control" value="{{ $slide->subtitle }}" placeholder="Enter text">
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{ $slide->title }}" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Price</label>
                  <input name="old_price" type="text" class="form-control" id="exampleInputPassword1" value="{{ $slide->old_price }}" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Price</label>
                  <input name="new_price" type="text" class="form-control" id="exampleInputPassword1" value="{{ $slide->new_price}}" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Background</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="background" id="file" type="file" onchange="load_image(event)">
                    </div>
                    
                  </div>
                </div>
                <img id="output" src="{{ asset('UI/assets/images/demos/demo-4/slider/'.$slide->background) }}" />
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