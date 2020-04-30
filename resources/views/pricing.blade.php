@extends('layout/main')


@section('title', 'Page Pricing')


@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-10"> Daftar Harga - {{$headers}}</h1>

      <table class="table border border-primary rounded">
      	<thead class="thead-dark">
      		<th scope="col">#</th>
      		<th scope="col">Kode Barang</th>
      		<th scope="col">Nama Barang</th>
      		<th scope="col">Harga</th>
      		<th scope="col">Action</th>    		
      	</thead>
      	<tbody>
      		<tr>
      			<th scope="row">1</th>
      			<td>101</td>
      			<td>Babi Guling</td>
      			<td>Rp. 1.000.000-,</td>
      			<td>
      				<a href="" class="badge badge-primary">Info</a>
      				<a href="" class="badge badge-success">Edit</a>
      				<a href="" class="badge badge-danger">Delete</a>
      			</td>
      		</tr>
      		<tr>
      			<th scope="row">2</th>
      			<td>102</td>
      			<td>Janit Guling</td>
      			<td>Rp. 10.000.000-,</td>
      			<td>
      				<a href="" class="badge badge-primary">Info</a>
      				<a href="" class="badge badge-success">Edit</a>
      				<a href="" class="badge badge-danger">Delete</a>
      			</td>
      		</tr>
      	</tbody>
      </table>
    </div>
  </div>
</div>

@endsection