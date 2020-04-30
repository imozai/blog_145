@extends('layout/main')

@section('title', 'Daftar Mahasiswa Baru')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Daftar Mahasiswa Baru - {{$headers}}</h1>

            
            <div class="col-sm-8">
                <a class="btn btn-primary col-sm-5 text-white" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah Mahasiswa</a>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                    <i class="fa fa-info-circle"></i> {{ session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif
                <div class="col-12"></div>
                <ul class="list-group">
                @foreach ($student as $student)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b><i class="fa fa-user"></i> {{ $student -> nama }}</b>
                        <a href="/student/{{$student -> id}}" class="badge badge-info"><i class="fa fa-info-circle"></i> Details</a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="tambahModalLabel"><i class="fa fa-plus"></i><i class="fa fa-user"></i> Tambah Data Mahasiswa</h5>
        <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/create" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="form-group">
            <label class="col-form-label">Nama Lengkap:</label>
            <input type="text" placeholder="Masukkan Nama Lengkap" class="form-control" name="namamhs" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">NIM (4 Angka Terakhir):</label>
            <input type="text" pattern="[0-9]{4}" title="isi dengan 4 Angka terakhir NIM anda" placeholder="Masukkan 4 angka terakhir NIM" class="form-control" name="nimmhs" maxlength="4" size="4">
            <p class="text-disable">*Contoh NIM anda <b>20170140145</b> jadi isi dengan <b>0145</b></p>
          </div>
          <div class="form-group">
            <label class="col-form-label">Email:</label>
            <input type="Email" placeholder="Masukkan Email" class="form-control" name="emailmhs" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Jurusan:</label>
            <input type="text" placeholder="Masukkan Jurusan" class="form-control" name="jurusanmhs" required>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="tanggalbuat" 
            value='<?php
            date_default_timezone_set("Asia/Bangkok");
            echo date("Y-m-d H:i:s");
            ?>'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-success" value="Tambah Data">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection