<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

    @include('admin.sidebar')

    @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="container">
                @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                  </div>
                @endif
                <h1 class="h1 text-center p-3">Add Doctor</h1>
                <form method="POST" action="{{url('upload_doctor')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3 row p-3">
                        <label for="name" class="col-sm-2 col-form-label">Doctor Name</label>
                        <div class="col-sm-10">
                        <input type="text" id="name" name="name" class="form-control-plaintext" placeholder="Write Doctor Name" required>
                        </div>
                    </div>
                    <div class="mb-3 row p-3">
                        <label for="number" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                        <input type="text" id="number" name="number" class="form-control-plaintext" placeholder="Write Doctor Number" required>
                        </div>
                    </div>
                    <div class="mb-3 row p-3 justify-content-end">
                      <label for="Speciality" class="col-2">Speciality</label>
                      <div class="col-10">
                        <select class="form-select" id="Speciality" name="speciality" aria-label="Default select example" required>
                          <option selected>-------Speciality-------</option>
                          <option value="skin">Skin</option>
                          <option value="heart">Heart</option>
                          <option value="eye">Eye</option>
                          <option value="nose">Nose</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row p-3">
                        <label for="room" class="col-sm-2 col-form-label">Room No</label>
                        <div class="col-sm-10">
                        <input type="text" id="room" name="room" class="form-control-plaintext" placeholder="Write Room Number" required>
                        </div>
                    </div>
                    <div class="mb-3 row p-3">
                        <label for="image" class="col-sm-2 col-form-label">Doctor Image</label>
                        <div class="col-sm-10">
                        <input type="file" class="$white" id="image" name="image" class="form-control-plaintext" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="text-center col-sm-12">
                            <input type="submit" value="Submit" class="btn btn-success btn-lg">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>