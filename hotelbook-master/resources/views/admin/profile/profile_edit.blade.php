@extends('admin.admin_master')
@section('admin')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<section class="content d-flex justify-content-center align-items-center">

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 m-auto ">
            <!-- general form elements -->
            <div class="card card-primary mt-5">
              <div class="card-header">
                <h3 class="card-title">Admin Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

             
              <form method="post" action="{{ route('admin.profile.update') }}"enctype="multipart/form-data">
              @csrf
        @method('patch')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <input type="hidden" name="old_photo" value="{{ Auth::user()->photo}}">
        
              <div class="card-body ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{Auth::user()->name}}">
                  </div>

                  @error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email"class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{Auth::user()->email}}">
                  </div>
                 

                  @error('email')
					<span class="text-danger">{{ $message }}</span>
					@enderror
                  

                  <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      @error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
                    </div>
                  </div>
                    </div>

                   
                    <div class="col-md-4">

                    
                    <img id="showImage" src="{{ (!empty($admin->photo))? asset($admin->photo):url('upload/images.png')}}" style="width: 150px; width: 150px; border: 1px solid #000000;">
                    
                    </div>

                    <div class="col-md-2 m-auto">
                   
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                  </div>
                 
                 
                </div>
                <!-- /.card-body -->

                
              </form>

            </div>
            <!-- /.card -->

            <!-- general form elements -->
         
            <!-- /.card -->

            <!-- Input addon -->
         
            <!-- /.card -->
            <!-- Horizontal Form -->
           
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <script type="text/javascript">

document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("photo").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
  }); 

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#photo').addEventListener('change', function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#showImage').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
    });
  });
</script>

@endsection         
           


