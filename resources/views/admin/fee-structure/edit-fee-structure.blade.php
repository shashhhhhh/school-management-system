@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Structure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Fee Structure</li>
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
                            <h3 class="card-title">Add Fee Structure</h3>
                        </div>


                        <form action="{{route('fee-structure.update',$fee->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class = "row">
                                    <div class="form-group col-md-4">
                                        <label>Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control">
                                            <option value="" disabled selected> Select Academic Year </option>
                                            @foreach ($academic_years as $academic_year )
                                                <option value="{{$academic_year->id}}"{{$fee->academic_year_id == $academic_year->id ? 'selected' : null }}>{{$academic_year->name}}</option>
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
                                            <option value="{{$class->id}}" {{$fee->class_id == $class->id ? 'selected' : null }}>{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Select Fee Head</label>
                                        <select name="fee_head_id" class="form-control">
                                            <option value="" disabled selected> Select Fee Head </option>
                                            @foreach ($fee_heads as $fee_head )
                                                <option value="{{$fee_head->id}}"{{$fee->fee_head_id == $fee_head->id ? 'selected' : null }}>{{$fee_head->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('fee_head_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                        </div>

                                </div>
                                <div class = "row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">April Fee</label>
                                    <input type="text" name="april" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter April Fee" value="{{old('april',$fee->april)}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">May Fee</label>
                                    <input type="text" name="may" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter May Fee" value="{{old('may',$fee->may)}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">June Fee</label>
                                    <input type="text" name="june" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter June Fee" value="{{old('june',$fee->june)}}">
                                </div>
                                </div>
                                <div class = "row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">July Fee</label>
                                        <input type="text" name="july" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter July Fee" value="{{old('july',$fee->july)}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">August Fee</label>
                                        <input type="text" name="august" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter August Fee" value="{{old('august',$fee->august)}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">September Fee</label>
                                        <input type="text" name="september" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter September Fee" value="{{old('september',$fee->september)}}">
                                    </div>
                                    </div>
                                <div class = "row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">October Fee</label>
                                            <input type="text" name="october" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter October Fee" value="{{old('october',$fee->october)}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">November Fee</label>
                                            <input type="text" name="november" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter November Fee" value="{{old('november',$fee->november)}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">December Fee</label>
                                            <input type="text" name="december" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter December Fee" value="{{old('december',$fee->december)}}">
                                        </div>
                                        </div>
                                        <div class = "row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">January Fee</label>
                                                <input type="text" name="january" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter January Fee" value="{{old('january',$fee->january)}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">February Fee</label>
                                                <input type="text" name="february" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter February Fee" value="{{old('february',$fee->february)}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">March Fee</label>
                                                <input type="text" name="march" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter March Fee" value="{{old('march',$fee->march)}}">
                                            </div>
                                            </div>
                     
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Fee Structure</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection
