@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Announcement management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Announcement management</li>
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
                            <h3 class="card-title">Add Announcement</h3>
                        </div>


                        <form action="{{route('announcement.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5" placeholder="Enter message"></textarea>
                                     @error('message')
                                        <p class="text-danger">{{$message}}</p>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Broadcast To</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="" disabled selected>Select List</option>
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="parent">Parent</option>
                                    </select>
                                     @error('type')
                                        <p class="text-danger">{{$message}}</p>
                                     @enderror
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
