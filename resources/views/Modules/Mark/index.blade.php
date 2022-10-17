@extends('default.app')
@section('title','Mark List')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between my-4">
        <h1 class="h4">Student Management System</h1>

        <a href="{{route('mark.create')}}" class="btn btn btn-primary shadow-sm">
            <i class="fas fa-user"></i> Add Mark
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
                <h6 class="font-weight-bold text-primary text-center">Mark List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mark-table" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Maths</th>
                                <th>Science</th>
                                <th>History</th>
                                <th>Term</th>
                                <th>Total Marks</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($markData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>
                                    @php
                                        $student = \App\Models\Modules\Student::select('id','name')->where('id',$data->name)->first();
                                    @endphp
                                    {{$student->name}}
                                </td>
                                <td>{{$data->maths}}</td>
                                <td>{{$data->science}}</td>
                                <td>{{$data->history}}</td>
                                <td>{{$data->term}}</td>
                                <td>{{$data->total}}</td>
                                <td>{{$data->created_at->format('M D,Y H:i A')}}</td>
                                <td>
                                    <a href="{{route('mark.edit',['id'=>Crypt::encrypt($data->id)])}}">Edit</a>
                                    <a href="javascript:void(0);" id="deleteMarkBtn" data-id="{{Crypt::encrypt($data->id)}}">Delete</a>
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