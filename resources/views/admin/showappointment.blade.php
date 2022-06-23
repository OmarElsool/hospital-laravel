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
            <h1 class="h1 text-center p-3">Appointments</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th class="text-wrap" scope="col">Customer Name</th>
                    <th class="text-wrap" scope="col">Email</th>
                    <th class="text-wrap" scope="col">Number</th>
                    <th class="text-wrap" scope="col">Doctor Name</th>
                    <th class="text-wrap" scope="col">Date</th>
                    <th class="text-wrap" scope="col">Message</th>
                    <th class="text-wrap" scope="col">Status</th>

                    <th class="text-wrap" scope="col">Approve/Cancel</th>
                    <th class="text-wrap" scope="col">Send Mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $appoint)
                    <tr>
                    <th class="text-wrap" scope="row">{{$appoint->name}}</th>
                    <td class="text-wrap">{{$appoint->email}}</td>
                    <td class="text-wrap">{{$appoint->number}}</td>
                    <td class="text-wrap" >{{$appoint->doctor}}</td>
                    <td class="text-wrap" >{{$appoint->date}}</td>
                    <td class="text-wrap" style="word-wrap: break-word; max-width: 2px;">{{$appoint->message}}</td>
                    <td class="text-wrap" >{{$appoint->status}}</td>

                    <td><a class="btn btn-success" href="{{url('approve',$appoint->id)}}">Approve</a> 
                    <a class="btn btn-danger" href="{{url('cancel',$appoint->id)}}">Cancel</a>
                    </td>
                    <td><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>