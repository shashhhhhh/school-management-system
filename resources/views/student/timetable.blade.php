@extends('student.layout')

@section('customCSS')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1> Timetable </h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Timetable</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @foreach ($timetable as $day => $details)
                        <div class="card-header bg-info">
                            {{ $day }}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $slot)
                                        <tr>
                                            <td>{{ $slot['subject'] }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('H:i', $slot['start_time'])->format('h:i A') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('H:i', $slot['end_time'])->format('h:i A') }}
                                            </td>
                                            <td>{{ $slot['room_no'] }}</td>
                                        </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@endsection

@section('customJS')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection