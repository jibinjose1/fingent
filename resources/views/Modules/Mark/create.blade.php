@extends('default.app')
@section('title','Create Mark')
@push('styles')
<style>

</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between my-4">
        <h1 class="h5">Add New Mark</h1>
        <a href="{{route('mark.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Go back
        </a>
    </div>

    <div class="row"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-12 createForm">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="p-5">
                                <form action="{{route('mark.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Student Name</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <select class="form-control select2" name="name" id="name" placeholder="name">
                                                    @foreach($studentData as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Term</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <select class="form-control select2" name="term" id="term" placeholder="Term">
                                                    <option value="One">One</option>
                                                    <option value="Two  ">Two</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Maths</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <input type="text" class="form-control" name="maths" id="maths" placeholder="maths">
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>Science</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <input type="text" class="form-control" name="science" id="science" placeholder="Science">
                                            </div>
                                        </div>

                                        <div class="d-sm-flex justify-content-between">
                                            <div class="col-sm-3 mb-3">
                                                <label>History</label>
                                            </div>
                                            <div class="col-sm-9 mb-3">
                                                <input type="text" class="form-control" name="history" id="history" placeholder="History">
                                            </div>
                                        </div>

                                    </div> 

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <button type="reset" class="btn btn-secondary" id="studentResetBtn">Reset</button>
                                            <button type="submit" class="btn btn-primary" id="studentSaveBtn">Save</button>
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