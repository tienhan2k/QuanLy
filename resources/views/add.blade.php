@extends('layout.admin')

@section('content')
    
<body>
  <br>
  <br>
  <h1 class="text-center mb-5 mt-5">Thêm nhân viên</h1>
  <div class="container mb-5">
      <div class="row justify-content-center">
          <div class="col-8">
              <div class="card">
                  <div class="card-body">
                      <form action="/themDuLieu" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('name')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                              <select class="form-select" name="sex" aria-label="Default select example">
                                  <option selected>Lựa chọn giới tính</option>
                                  <option value="Nam">Nam</option>
                                  <option value="Nữ">Nữ</option>
                              </select>
                              @error('sex')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                            <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('phone_number')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Chèn ảnh</label>
                              <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror
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