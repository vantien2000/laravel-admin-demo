@extends('Admin.layout.dashboard')
@section('section')
    @if (session('message'))
      <script>alert(session('message'));</script>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Sldie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Slide</li>
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
              <!-- /.card-header -->
              <!-- form start -->
              <form pjax-container action="{{ url('admin/addSlide') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Subtitle</label>
                      <input name="subtitle" type="text" class="form-control" placeholder="Enter text">
                    </div>
                      @foreach ($errors->get('subtitle') as $error)
                        <div class="text text-danger">
                          {{ $error }}
                        </div>
                      @endforeach
                    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter text">
                  </div>
                    @foreach ($errors->get('title') as $error)
                      <div class="text text-danger">
                        {{ $error }}
                      </div>
                    @endforeach
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Price</label>
                    <input name="old_price" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter text" required>
                  </div>
                  @foreach ($errors->get('old_price') as $error)
                    <div class="text text-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Price</label>
                    <input name="new_price" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter text" required>
                  </div>
                  @foreach ($errors->get('new_price') as $error)
                    <div class="text text-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                  <div class="form-group">
                    <label for="exampleInputFile">Background</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="background" id="file" type="file" onchange="load_image(event)">
                      </div>
                    </div>
                    @foreach ($errors->get('background') as $error)
                      <div class="text text-danger">
                        {{ $error }}
                      </div>
                    @endforeach
                  </div>
                  <img id="output" src="{{ asset('backend/dist/img/default-150x150.png') }}" />
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="btn-create" class="btn btn-primary">Create</button>
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