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
           <li class="breadcrumb-item"><a href="/petugas">Tambah Data Petugas</a></li>
           <li class="breadcrumb-item active">Tambah Petugas</li>
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
              <h2 class="card-title">Tambah Data Petugas</h2><br>
              <table id="example1" class="table table-bordered table-striped">
            <form action="store" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama Petugas</label>
                      <div class="col-sm-10">
                          <input type="text" name="namapetugas" class="form-control" placeholder="Nama Petugas">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" placeholder="username">
                          </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="control-label col-sm-2">Password</label>
                      <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="password">
                      </div>
                  </div>
                  
                  <select name="idlevel" class="form-control" id="">
                    <option value="">-- LEVEL --</option>
                    @foreach ($data as $item)
                    <option value="{{ $item['idlevel'] }}">{{ $item['namalevel'] }}</option>
                    @endforeach
                </select>
                  
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