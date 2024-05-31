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
           <li class="breadcrumb-item"><a href="/petugas"></a></li>
           <li class="breadcrumb-item active">Edit</li>
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
              <h2 class="card-title">Edit Data Petugas</h2><br>
              <table id="example1" class="table table-bordered table-striped">
                @foreach ($petugas as $d)
            <form action="/petugas/update" method="POST" class="form-horizontal">
              @csrf
              @method('POST')
              <input type="hidden" name="idpetugas" value="{{ $d->idpetugas }}">
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama Petugas</label>
                      <div class="col-sm-10">
                        <input type="text" name="namapetugas" class="form-control" placeholder="Nama Petugas" value="{{ $d->namapetugas }}">                    
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" placeholder="username" value="{{ $d->username }}">
                          </div>
                  </div>
                  

                  <select name="idlevel" class="form-control" id="">
                    <option value="">-- LEVEL --</option>
                    @foreach ($detail_level as $item)
                    <option value="{{ $item['idlevel'] }}"{{ $item['idlevel'] == $d->idlevel ? 'selected' : '' }}>{{ $item['namalevel'] }}</option>
                    @endforeach
                    </select>

                  <div class="d-grid gap-2 d-md-block">
                      <input class="btn" style="background-color:aqua;" type="submit" name="submit" value="Simpan">
                      
                  </div>
              </div>
          </form>
          @endforeach
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