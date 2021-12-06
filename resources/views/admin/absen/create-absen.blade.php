<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AdminLTE 3 | Starter</title>
    @include('Template.head')
    <script src="{{ asset('Js/jam.js') }}"></script>
    <style>
        #watch {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                4px 4px 20px rgba(210, 45, 26, 0.4),
                4px 4px 30px rgba(210, 25, 16, 0.4),
                4px 4px 40px rgba(210, 15, 06, 0.4);
        }

    </style>

</head>
<body class="hold-transition sidebar-mini" onload="realtimeClock()">

    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Halaman Untuk Presensi Masuk</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Presensi Masuk</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('presensis.index') }}"> Back</a>
            </div>
        </div>
    </div>

            <!-- /.content-header -->

            <!-- Main content -->
    <form action="{{ route('presensis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <strong>NIS : </strong>
                    <input type="text" name="nis" class="form-control" placeholder="NIS">
                </div>
                <div class="form-group">
                    <strong>Tanggal : </strong>
                    <input type="date" name="tgl" class="form-control" placeholder="Tanggal">
                </div>
                <div class="form-group">
                    <strong>Jam Kedatangan : </strong>
                    <input type="time" name="jammasuk" class="form-control" placeholder="Jam Kedatangan">
                </div>
                <div class="form-group">
                    <strong>Jam Kepulangan : </strong>
                    <input type="time" name="jamkeluar" class="form-control" placeholder="Jam Kepulangan">
                </div>
                <div class="form-group">
                    <strong>Jam Kehadiran : </strong>
                    <input type="time" name="jamkerja" class="form-control" placeholder="Jam Kehadiran">
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>