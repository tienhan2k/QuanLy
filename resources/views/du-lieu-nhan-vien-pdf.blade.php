<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
*{ font-family: DejaVu Serif !important;}
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1 style="text-align: center">Dữ liệu nhân viên</h1>

<table id="customers">
  <tr>
    <th>STT</th>
    <th>Tên</th>
    <th>Giới tính</th>
    <th>Số điện thoại</th>
  </tr>
  @php
      $count = 1;
  @endphp
    @foreach ($data as $row)
    <tr>
        <td>{{$count++}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->sex}}</td>
        <td>0{{$row->phone_number}}</td>
    </tr>
    @endforeach
    
</table>

</body>
</html>


