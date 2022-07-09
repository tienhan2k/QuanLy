@extends('layout.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trang quản lý</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Dữ liệu nhân viên</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <a href="/them-nhan-vien" class="btn btn-success">Thêm mới</a>

        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
                <form action="/nhan-vien" method="GET">
                    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <div class="col-auto">
                <a href="#" class="btn btn-primary">Tìm kiếm</a>
            </div>
            <div class="col-auto">
                <a href="/xuat-pdf" class="btn btn-info">Xuất PDF</a>
            </div>
            <div class="col-auto">
                <a href="/xuat-excel" class="btn btn-dark">Xuất Excel</a>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                    Nhập Excel
                </button>
            </div>
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nhập file Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/nhap-excel" method="POST" enctype="multipart/form-data">
            <div class="modal-body">            
                @csrf
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>            
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
      </div>
    </form>
    </div>
  </div>
        </div>
        <div class="row">
            
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>

                    @php
                    $count = 1;     
                    @endphp
                        
                    @foreach ($data as $index => $row)
                  <tr>
                    <th scope="row">{{$index + $data->firstItem()}}</th>
                    <td>{{$row->name}}</td>
                    <td>
                        <img src="{{asset('images/'.$row->image)}}" alt="" style="width: 40px">
                    </td>
                    <td>{{$row->sex}}</td>
                    <td>0{{$row->phone_number}}</td>
                    <td>{{$row->created_at->format('D M Y')}}</td>
                    <td>
                        <a href="/sua-thong-tin/{{$row->id}}" class="btn btn-primary">Sửa</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-name="{{$row->name}}">Xoá</a>
                    </td>
                  </tr>   
                  @endforeach               
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

  $('.delete').click(function(){
    var ppleId = $(this).attr('data-id');
    var ppleName = $(this).attr('data-name');

    swal({
      title: "Bạn có chắc không?",
      text: "Bạn sẽ xoá dữ liệu của nhân viên có tên là " + ppleName + ".",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/xoa-nhan-vien/" + ppleId
        swal("Bạn đã xoá dữ liệu thành công!", {
          icon: "success",
        });
      } else {
        swal("Đã huỷ hành động xoá!");
      }
    });
  });       

</script>

<script>
  @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
  @elseif (Session::has('error'))
    toastr.error("{{Session::get('error')}}")
  @endif
</script>
@endpush