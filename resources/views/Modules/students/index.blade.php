@extends('default.app')
@section('title','Student List')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between my-4">
        <h1 class="h4">Student Management System</h1>

        <a href="{{route('student.create')}}" class="btn btn btn-primary shadow-sm">
            <i class="fas fa-user"></i> Add Student
        </a>
    </div>
    <div class="d-sm-flex justify-content-between my-4">
        <a href="{{route('welcome')}}" class="btn btn btn-primary shadow-sm">
            <i class="fas fa-home"></i> Back To Home
        </a>
    </div>

    <div class="row">   
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary text-center">Students List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="student-table" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Reporting Teacher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->age}}</td>
                                <td>{{$data->gender}}</td>
                                <td>
                                    @php
                                        $teacher = \App\Models\Modules\Teacher::select('id','name')->where('id',$data->teacher)->first();
                                    @endphp
                                    {{$teacher->name}}
                                </td>
                                <td>
                                    <a href="{{route('student.edit',['id'=>Crypt::encrypt($data->id)])}}">Edit</a>
                                    <a href="javascript:void(0);" id="deleteStudentBtn" data-id="{{Crypt::encrypt($data->id)}}">Delete</a>
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
@endsection

@push('scripts')
<script src="\assets\js\delete.js"></script>
@endpush