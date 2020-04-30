@extends('layout/main')


@section('title', 'Page Mahasiswa')

<style type="text/css">
      body {
        
        background-image: linear-gradient(30deg, #445 12%, transparent 12.5%, transparent 87%, #445 87.5%, #445),
        linear-gradient(150deg, #445 12%, transparent 12.5%, transparent 87%, #445 87.5%, #445),
        linear-gradient(30deg, #445 12%, transparent 12.5%, transparent 87%, #445 87.5%, #445),
        linear-gradient(150deg, #445 12%, transparent 12.5%, transparent 87%, #445 87.5%, #445),
        linear-gradient(60deg, #99a 25%, transparent 25.5%, transparent 75%, #99a 75%, #99a), 
        linear-gradient(60deg, #99a 25%, transparent 25.5%, transparent 75%, #99a 75%, #99a);
        background-size:80px 140px;
        background-position: 0 0, 0 0, 40px 70px, 40px 70px, 0 0, 40px 70px;
      }
</style>

@section('container')

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mt-10 text-white bg-dark"> Daftar Mahasiswa - {{$headers}}</h1>

      <table class="table table-bordered table-striped table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Email</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Time Created</th>
                <th scope="col">Last Modified</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mahasiswa as $mhs)
            <tr>
                <th scope="row">{{$mhs->id}}</th>
                <td>{{$mhs->nama}}</td>
                <td>2017014<b>{{$mhs->nim}}</b></td>
                <td>{{$mhs->email}}</td>
                <td>{{$mhs->jurusan}}</td>
                <td>{{$mhs->created_at}}</td>
                <td>{{$mhs->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection