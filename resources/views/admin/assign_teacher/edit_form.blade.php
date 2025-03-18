@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Assign Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Assign Teacher</li>
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
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Update Assign Teacher</h3>
                            </div>
                            <form action="{{ route('assign-teacher.update',$assign_teacher->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="class_id" class="form-control" id="class_id">
                                            <option disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{$class->id == 
                                                    $assign_teacher->$class_id ?? 
                                                    'selected': ''}}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <select name="subject_id" class="form-control" id="subject_id">
                                            <option disabled selected>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                    <option value="{{$subject->subject->id}}" {{$subject->subject->id == 
                                                        $assign_teacher->subject_id ? 'selected' :''}}> {{$subject->subject->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select name="teacher_id" class="form-control">
                                            <option disabled selected>Select Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{$assign_teacher->teacher_id == 
                                                    $teacher->id ? 'selected' : ''}} > {{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
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
@section('customJS')
    <script>
        $('#class_id').change(function(){
            const class_id = $(this).val();
            $.ajax({
                url: "{{ route('findSubject') }}",
                type:"get",
                data: {class_id},
                dataType: 'json',
                success: function(response){
                    $('#subject_id').find('option').not(":first").remove();
                    $.each(response['subjects'],(key,item)=>{
                        $('#subject_id').append(`
                            <option value="${item.subject_id}">${item.subject.name}</option>`
                        )

                    })
                }
            })
        })
    </script>
@endsection
