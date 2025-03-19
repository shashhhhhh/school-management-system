@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Timetable</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Timetable</li>
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
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Add Timetable</h3>
                        </div>

                        <form action="{{ route('assign-subject.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="class_id" class="form-control">
                                        <option disabled selected>Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id') 
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="subject_id" class="form-control">
                                        <option disabled selected>Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id') 
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($days as $day)
                                        <tr>  
                                            <td>{{$day->name}}</td>
                                            <input type="hidden" name="timetable[{{$i}}][day_id]" value="{{$day->id}}">
                                            <td><input type="time" name="timetable[{{$i}}][start_time]"></td>
                                            <td><input type="time" name="timetable[{{$i}}][end_time]"></td>
                                            <td><input type="number" name="timetable[{{$i}}][room_no]"></td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
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
