<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Goodwill - Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-red for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red.min.css')}}">

  <!-- DataTables CDN -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

  <!-- JQuery for modal box -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>-->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--[endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-red                                |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!--Including Header from header.blade.php-->
  @include('admin/header')
  <!--./header-->

  <!-- Left side column. contains the logo and sidebar -->
  
  @include('admin/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Tiket
        <small>Informasi setiap tiket yang dimiliki setiap penumpang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->        

        <div class="content">
          <div class="container-fluid">
            @yield('content')

            <div class="box-body">
                <!-- START MODAL FOR ADD -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" style="width: 10rem; float: right; margin-bottom: 1rem">
                  Add
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="margin-bottom: -20px" id="exampleModalLabel">Tambah Data Detail Tiket</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" id="formAdd" method="POST" action="/detailAction">
                        <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">                    
                                {{csrf_field()}}                    
                                <label for="in_id">Id Tiket</label>                    
                                <input type="text" class="form-control" placeholder="Masukan Id" name="id_tiket">                    
                                <label for="in_harga">Harga</label>                    
                                <input type="text" class="form-control" placeholder="Masukan Harga" name="harga">                    

                                <label for="in_tujuan">Tujuan</label>                    
                                <input type="text" class="form-control" placeholder="Masukan Tujuan" name="tujuan">                    

                                <label for="in_kode">Kode Tiket</label>                    
                                <input type="text" class="form-control" placeholder="Masukan Kode" name="kode_tiket">                  
                              </div><!-- /.box-body -->                                
                            </div>                
                        </div>
                        <div class="modal-footer">
                          <input style="float:right;" type="submit" class="btn btn-primary" name="btn_submit" value="Submit"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- END MODAL -->

                <!-- START MODAL FOR EDIT -->

                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="margin-bottom: -20px" id="exampleModalLabel">Edit Data Detail Tiket</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" id="editForm" action="/admin/detail/edit/">
                        {{csrf_field()}}                    
                        {{method_field('PUT')}}



                        <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">        

                                <label for="in_id">Id Tiket</label>                    
                                <input type="text" class="form-control" id="in_id" placeholder="Masukan Id" name="id_tiket">                    
                                <label for="in_harga">Harga</label>                    
                                <input type="text" class="form-control" id="in_harga" placeholder="Masukan Harga" name="harga">                    

                                <label for="in_tujuan">Tujuan</label>                    
                                <input type="text" class="form-control" id="in_tujuan" placeholder="Masukan Tujuan" name="tujuan">                    

                                <label for="in_kode">Kode Tiket</label>                    
                                <input type="text" class="form-control" id="in_kode" placeholder="Masukan Kode" name="kode_tiket">                  
                              </div><!-- /.box-body -->                                
                            </div>                
                        </div>
                        <div class="modal-footer">
                          <input style="float:right;" type="submit" class="btn btn-primary" name="btn_update" value="Update"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- END MODAL -->

            <table id="detailTable" class="table table-striped table-bordered table-hover">
                <tr>
                  <th>Id_tiket</th>
                  <th>Harga</th>
                  <th>Tujuan</th>
                  <th>Kode_Tiket</th>
                  <th>Action</th>
                </tr>
                
                  @foreach($tb_detail as $d)
                  <tr>
                    <td>{{ $d->id_tiket }}</td> 
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->kode_tiket}}</td>
                    <td>
                      <input type="submit" id="edit" name="edit" data-toggle="modal" data-target="#editModal" class="btn btn-primary editBtn" value="Edit">
                      <a href="/admin/detail/hapus/{{ $d->id_tiket }}">
                        <input type="submit" name="btnDelete" class="btn btn-danger" value="Delete">
                      </a> 
                    </td>
                  </tr>
                  @endforeach
            </table>
            </div>
            
          </div>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  @include('admin/footer')

  <!-- Control Sidebar -->
  @include('admin/control-sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->



<!-- CDN DataTables Script -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<!-- /* E D I T  W I T H  M O D A L  B O X */ -->
<script type="text/javascript">
  
  $(document).ready(function() {

    var table=$('#detailTable').DataTable();

    table.on('click', '.editBtn',function(){

      $tr =  $(this).closest('tr');
      if($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
      }

      var data=table.row($tr).data();
      console.log(data);


      $('#id_tiket').val(data[1]);
      $('#harga').val(data[2]);
      $('#tujuan').val(data[3]);
      $('#kode_tiket').val(data[4]);

      $('#editForm').attr('action','/admin/detail/edit/'+data[0]);
      $('#editModal').modal('show');
    });

  });

</script>
</body>
</html>