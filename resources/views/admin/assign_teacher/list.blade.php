@extends('admin.layout')
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
                  <h1>Assign Subject To Teacher</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Assign Subject To Teacher List</li>
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

                  </div>

                  <div class="card">
                    @if(Session::has('success'))
                      <div class="alert alert-success">
                          {{ Session::get('success') }}
                      </div>
                    @endif
                    <div class="card-header">
                      <form action="" method="GET" class="row">
                          <div class="form-group col-md-3">
                              <select name="class_id" class="form-control">
                                  <option disabled selected>Select Class</option>
                                  @foreach ($classes as $class)
                                      <option value="{{ $class->id }}" {{ $class->id == request('class_id') ? 'selected' : '' }}>
                                          {{ $class->name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-3">
                              <button type="submit" class="btn btn-primary">Filter</button>
                          </div>
                      </form>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                    <th>Theory/Practical</th>
                                    <th>Teacher Name</th>
                                    <th>Created Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assign_teachers as $assign_teacher)
                                  <tr>
                                      <td>{{ $assign_teacher->id }}</td>
                                      <td>{{ $assign_teacher->class->name }}</td>
                                      <td>{{ $assign_teacher->subject->name }}</td>
                                      <td>{{ $assign_teacher->subject->type }}</td>
                                      <td>{{ $assign_teacher->teacher->name }}</td>
                                      <td>{{ $assign_teacher->created_at }}</td>
                                      <td>
                                          <a href="{{ route('assign-teacher.edit', $assign_teacher->id) }}" class="btn btn-primary">Edit</a>
                                      </td>
                                      <td>
                                          <a href="{{ route('assign-teacher.delete', $assign_teacher->id) }}" 
                                             onclick="return confirm('Are You Sure You Want To Delete This Item?');" 
                                             class="btn btn-danger">Delete</a>
                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                  </div>

              </div>

          </div>

      </div>

  </section>

</div>

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
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
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