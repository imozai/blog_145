<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = 'Students Page';
        $student = Student::all();
        return view('student.index', ['student' => $student], ['headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nama = $request->input('namamhs');
        $nim = $request->input('nimmhs');
        $email = $request->input('emailmhs');
        $jurusan = $request->input('jurusanmhs');
        $tanggalbuat = $request->input('tanggalbuat');
        $data=array('nama'=>$nama,"nim"=>$nim,"email"=>$email,"jurusan"=>$jurusan,"created_at"=>$tanggalbuat);
        DB::table('student')->insert($data);
        return redirect('/student') -> with('status',"Data Mahasiswa a/n: ${nama} berhasil di Tambahkan");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $headers =  "Detail {$student->nama} Page";
        return view('student.show', compact ('student'), ['headers' => $headers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama = $request->input('namamhs');
        $nim = $request->input('nimmhs');
        $email = $request->input('emailmhs');
        $jurusan = $request->input('jurusanmhs');
        $tanggal = $request->input('tanggal');
        DB::update('update student set nama=?,nim=?,email=?,jurusan=?,updated_at=? where id = ?',[$nama,$nim,$email,$jurusan,$tanggal,$id]);
        return redirect('/student') -> with('status',"Data Mahasiswa a/n: ${nama} berhasil di Update") -> with('statusupd','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student :: destroy($student -> id);
        return redirect('/student') -> with('status',"Data Mahasiswa a/n: {$student->nama} berhasil di Hapus");
    }
}