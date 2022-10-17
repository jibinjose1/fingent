@extends('default.app')
@section('title','Edit Student')
@push('styles')

@endpush
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between my-4">
        <h1 class="h5">Edit Student ({{$studentData->name}})</h1>
        <a href="{{route('student.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Go back
        </a>
    </div>

    <div class="row"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="p-5">
                                <form action="{{route('student.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$studentData->name}}">
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="{{$studentData->age}}">
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <select class="form-control select2" name="gender" id="gender" placeholder="Gender">
                                                    <option @if($studentData->gender=="M") selected @endif value="M">Male</option>
                                                    <option @if($studentData->gender=="F") selected @endif value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Reporting Teacher</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <select class="form-control select2" name="teacher" id="teacher" placeholder="teacher">
                                                    @foreach ($teacherData as $data)
                                                        <option @if($studentData->teacher==$data->id) selected @endif value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="hidden" name="encID" id="encID" value="{{$encID}}">
                                            <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="\assets\js\common.js"></script>
<script>
    $('.select2').select2(); 
</script>
@endpush