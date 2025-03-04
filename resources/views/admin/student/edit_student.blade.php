@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Student</li>
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
                            <h3 class="card-title">Update Student</h3>
                        </div>




                        <form action="{{route('student.update',$student->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control">
                                            <option value="" disabled selected> Select Academic Year </option>
                                            @foreach ($academic_years as $academic_year )
                                            <option value="{{$academic_year->id}}" {{$academic_year->id== $student->academic_year_id ? 'selected': ''}}>{{$academic_year->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('academic_year_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Select Class</label>
                                        <select name="class_id" class="form-control">
                                            <option value="" disabled selected> Select Class </option>
                                            @foreach ($classes as $class )
                                            <option value="{{$class->id}}" {{$class->id== $student->class_id ? 'selected': ''}}>{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control" value="{{old('admission_date', $student->admission_date)}}">
                                        @error('admission_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Student Name" value="{{old('name', $student->name)}}">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student's Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Student's Father Name" value="{{old('father_name', $student->father_name)}}">
                                        @error('father_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student's Mother Name</label>
                                        <input type="text" name="mother_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Student's Mother Name" value="{{old('mother_name', $student->mother_name)}}">
                                        @error('mother_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Date Of Birth </label>
                                        <input type="date" name="dob" class="form-control" id="exampleInputEmail1" value="{{old('dob', $student->dob)}}">
                                        @error('dob')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="text" name="mobno" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Mobile Number" value="{{old('mobno', $student->mobno)}}">
                                        @error('mobno')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email Address" value="{{old('email', $student->email)}}">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>


                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

</div>
@endsection