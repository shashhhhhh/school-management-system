@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Subject</li>
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
                            <h3 class="card-title">Update Subject</h3>
                        </div>


                        <form action="{{route('subject.update',$subject->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Subject Name" value="{{$subject->name}}">
                                </div>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>

                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="type" class="form-control">
                                      <option value="">Select Type</option>
                                      <option value="theory" {{ $subject->type == 'theory' ? 'selected' : ''}}>Theory</option>
                                      <option value="practical" {{ $subject->type == 'practical' ? 'selected' : ''}}>Practical</option>
                                    </select>
                                </div>
                                @error('type')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection
