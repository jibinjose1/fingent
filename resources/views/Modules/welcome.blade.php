@extends('default.app')
@section('title','Student Management System')
@push('styles')
<style>
    .row{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%)
    }
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="my-4">
        <h1 class="h4 text-center">Student Management System</h1>
        <hr>
    </div>
    <div class="row">   
        <div class="card shadow m-5 p-5">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <a href="{{route('mark.index')}}" class="btn btn btn-primary shadow-sm">
                    Mark Section
                </a>
                <a href="{{route('student.index')}}" class="btn btn btn-primary shadow-sm">
                    Student Section
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

