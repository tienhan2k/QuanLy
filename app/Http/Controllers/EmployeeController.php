<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    //hien thi
    public function index(Request $request)
    { 
        if ($request->has('search')) {
            $data = Employee::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
            // dd($data);
            Session::put('current_url', request()->fullUrl());
        } else {
            $data = Employee::paginate(5);
            Session::put('current_url', request()->fullUrl());
        }        

        return view('nhan-vien', compact('data'));
    }

    //them nhan vien
    public function add()
    {
        return view('add');
    }

    public function addData(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|min:2|max:100',
            'sex' => 'required|in:Nam,Nữ',
            'phone_number' => 'required|min:9|max:11',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000000',
        ]);
        $data = Employee::create($request->all());
        
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('index')->with('success', 'Thêm nhân viên thành công!');
    } 

    //sua nhan vien
    public function edit($id)
    {
        $data = Employee::find($id);
        // dd($data);

        return view('edit', compact('data'));
    }

    public function editData(Request $request, $id)
    {
        $data = Employee::find($id);
        // dd($data);
        $data->update($request->all());
        if (session('current_url')) {
            return redirect(session('current_url'))->with('success', 'Cập nhật nhân viên thành công!');
        }

        return redirect()->route('index')->with('success', 'Cập nhật nhân viên thành công!');
    }

    //xoa nhan vien
    public function delete($id)
    {
        $data = Employee::find($id);
        // dd($data);
        $data->delete();
        
        return redirect()->route('index')->with('success', 'Xoá nhân viên thành công!');
    }

    //xuat pdf
    public function exportPdf()
    {
        $data = Employee::all();
        // dd($data);
        view()->share('data', $data);
        $pdf = PDF::loadview('du-lieu-nhan-vien-pdf');
        return $pdf->download('data.pdf');
    }

    //xuat excel
    public function exportExcel()
    {
        return Excel::download(new EmployeeExport, 'du-lieu-nhan-vien.xlsx');
    }

    //nhap excel
    public function importExcel(Request $request)
    {
        $data = $request->file('file');
        // dd($data);
        $fileName = $data->getClientOriginalName();
        $data->move('EmployeeData', $fileName);
        Excel::import(new EmployeeImport, public_path('/EmployeeData/'.$fileName));
        return redirect()->back();
    }
}
