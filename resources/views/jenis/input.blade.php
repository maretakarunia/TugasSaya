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
           <li class="breadcrumb-item"><a href="/barang"></a></li>
           <li class="breadcrumb-item active">Tambah</li>
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
              <h2 class="card-title">Tambah Data Jenis</h2><br>
              <table id="example1" class="table table-bordered table-striped">
            <form action="store" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama Jenis</label>
                      <div class="col-sm-10">
                          <input type="text" name="namajenis" class="form-control" placeholder="Nama Jenis">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Kode Jenis</label>
                          <div class="col-sm-10">
                            <input type="text" name="kodejenis" class="form-control" placeholder="Kode Jenis">
                          </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="control-label col-sm-2">Keterangan</label>
                      <div class="col-sm-10">
                          <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                      </div>
                  </div>
                  <div class="d-grid gap-2 d-md-block">
                      <input class="btn" style="background-color:aqua;" type="submit" name="submit" value="Simpan">
                      
                  </div>
              </div>
          </form>
          
        </table>
                
            </div>
            <!-- /.card-header -->
            
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