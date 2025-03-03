@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Create Student</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                        </div>


                        <form action="{{route('student.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Academic Year</label>
                                        <select class="form-control">
                                            <option>Select Academic Year</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select Class</label>
                                        <select class="form-control">
                                            <option>Select Class</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Admissin Date</label>
                                        <input type="date" name="admission_date" class="form-control" placeholder="Enter Admissin Date">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>April Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter April Fee">
                                        @error('admission_date')
                                    </div>
                                    <div class="col-md-4">
                                        <label>May Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter May Fee">
                                    </div>
                                    <div class="col-md-4">
                                        <label>June Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter June Fee">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>July Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter July Fee">
                                    </div>
                                    <div class="col-md-4">
                                        <label>August Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter August Fee">
                                    </div>
                                    <div class="col-md-4">
                                        <label>September Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter September Fee">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>October Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter October Fee">
                                    </div>
                                    <div class="col-md-4">
                                        <label>February Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter November Fee">
                                    </div>
                                    <div class="col-md-4">
                                        <label>December Fee</label>
                                        <input type="text" class="form-control" placeholder="Enter December Fee">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection