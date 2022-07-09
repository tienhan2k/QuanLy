@extends('layout.admin')

@section('content')
    
<body>
  <h1 class="text-center">Sửa thông tin nhân viên</h1>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-8">
              <div class="card">
                  <div class="card-body">
                      <form action="/suaDuLieu/{{$data->id}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->name}}">
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                              <select class="form-select" name="sex" aria-label="Default select example">
                                  <option selected>{{$data->sex}}</option>
                                  <option value="Nam">Nam</option>
                                  <option value="Nữ">Nữ</option>
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                            <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->phone_number}}">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

@endsection