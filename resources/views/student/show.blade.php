@extends('layout/main')

@section('title', 'Detail Mahasiswa Baru')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="mt-10"><i class="fa fa-address-book"></i>Detail Mahasiswa : {{$student -> nama}}</h1>
            <p class="text-disable">Created <i class="fa fa-safari"> {{ $student -> created_at }}</i><br>
                Modified <i class="fa fa-safari" id="modified"> {{ $student -> updated_at }}</i>
            </p>
            <div class="card col-sm-6">
                <div class="card-body">
                    <h5 class="card-title"><b>Nama : </b>{{ $student -> nama }}</h5>
                    <h5 class="card-text"><b>NIM : </b>2017014-<u>{{ $student -> nim }}</u></h5>
                    <h5 class="card-text"><b>Email : </b><a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank">{{ $student -> email }}</a></h5>
                    <h5 class="card-text"><b>Jurusan : </b>{{ $student -> jurusan }}</h5>
                    <a class="btn btn-primary col-sm-2 text-white" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square"></i> Edit</a>
                    <a class="btn btn-danger col-sm-3 text-white" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i> Hapus</a>
                </div>
            </div>
            <a href="/student" class="card-link"><b> <-- <u>Kembali</u></b></a>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="editModalLabel"><i class="fa fa-pencil"></i><i class="fa fa-user"></i> Edit Data Mahasiswa</h5>
        <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/update/{{$student -> id}}" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
            <input type="text" placeholder="Masukkan Nama Lengkap" class="form-control" name="namamhs" value='<?php echo$student->nama; ?>' required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIM (4 Angka Terakhir):</label>
            <input type="text" placeholder="Masukkan 4 angka terakhir NIM"  class="form-control" pattern="[0-9]{4}" title="isi dengan 4 Angka terakhir NIM anda" name="nimmhs" value='<?php echo$student->nim; ?>' required>
            <p class="text-disable">*Contoh NIM anda <b>20170140145</b> jadi isi dengan <b>0145</b></p>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="Email" placeholder="Masukkan Email" class="form-control" name="emailmhs" value='<?php echo$student->email; ?>' required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jurusan:</label>
            <input type="text" placeholder="Masukkan Jurusan" class="form-control" name="jurusanmhs" value='<?php echo$student->jurusan; ?>' required>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="tanggal" 
            value='<?php
            date_default_timezone_set("Asia/Bangkok");
            echo date("Y-m-d H:i:s");
            ?>'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
            <input type="submit" data-toggle="modal" class="btn btn-success" value="Update Data">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel"><i class="fa fa-trash"></i> Hapus Data<br> a/n {{ $student -> nama }} ?</h5>
        <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
        <form action="{{ $student -> id }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    var modif = document.getElementById("modified");
    if (modif.innerHTML == " ") {
        modif.innerHTML = " Belum ada update data";
    }
    else{ modif.innerHTML = "{{ $student -> updated_at }}" }
</script>

@endsection