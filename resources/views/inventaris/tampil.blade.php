@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h2 class="card-title">Data Barang</h2>
              <a href="inventaris/create" class="btn btn-info" style="float: right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Nama </th>
                 <th>Kondisi</th>
                 <th>Keterangan</th>
                 <th>Jumlah</th>  
                 <th>Tanggal register</th> 
                 <th>Kode inventaris</th> 
                 <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data as $d)
                  <tr>
                      <th>{{ $loop->iteration  }}</th>

                      <th>{{ $d->nama}}</th>

                      <th>{{ $d->kondisi }}</th>

                      <th>{{ $d->keterangan }}</th> 

                      <th>{{ $d->jumlah }}</th> 

                      <th>{{ $d->tanggalregister }}</th>
                      
                      <th>{{ $d->kodeinventaris }}</th> 




                      <th>
                        <a href="/inventaris/edit/{{ $d->idinventaris }}" class="btn btn-warning">Edit</a>
                        <a href="/inventaris/hapus/{{ $d->idinventaris }}" class="btn btn-danger">Hapus</a>
                      </th>

                  </tr>
                  @endforeach
                 
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection