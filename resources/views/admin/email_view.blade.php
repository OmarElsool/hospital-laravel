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
            <form method="POST" action="{{url('send_email',$data->id)}}" >
                @csrf
                @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                  </div>
                @endif
                <h1 class="h1 text-center p-3">Send Email</h1>
                <div class="mb-3 row p-3">
                    <label for="greeting" class="col-sm-2 col-form-label">Greeting</label>
                    <div class="col-sm-10">
                    <input type="text" id="greeting" name="greeting" class="form-control-plaintext" placeholder="Greeting" required>
                    </div>
                </div>
                <div class="mb-3 row p-3">
                    <label for="body" class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                    <input type="text" id="body" name="body" class="form-control-plaintext" placeholder="mail body" required>
                    </div>
                </div>
                <div class="mb-3 row p-3">
                    <label for="actiontext" class="col-sm-2 col-form-label">Action Text</label>
                    <div class="col-sm-10">
                    <input type="text" id="actiontext" name="actiontext" class="form-control-plaintext" required>
                    </div>
                </div>
                <div class="mb-3 row p-3">
                    <label for="actionurl" class="col-sm-2 col-form-label">Action URL</label>
                    <div class="col-sm-10">
                    <input type="text" id="actionurl" name="actionurl" class="form-control-plaintext" required>
                    </div>
                </div>
                <div class="mb-3 row p-3">
                    <label for="endpart" class="col-sm-2 col-form-label">End Part</label>
                    <div class="col-sm-10">
                    <input type="text" id="endpart" name="endpart" class="form-control-plaintext" required>
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
    @include('admin.script')
  </body>
</html>