@extends('admin.layouts.master')
@section('title','Add Student')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">All Students</a></li>
                            <li><a href="{{route('students.create')}}">Add Student</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Student</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('students.store')}} " method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf 
                            {{-- @method('PUT') --}}
                            @if(Session::has('msg'))
                                <div class='alert alert-success'>{{Session::get('msg')}}</div>
                            @endif
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Code</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="id" placeholder="Code" class="form-control @error('id') is-invalid @enderror" value="{{old('id')}} ">
                                   
                                    <small class="form-text text-muted" style="color:red !important" >@error('id') {{"$message"}} @enderror</small></div>
                                    
                                </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    <small class="form-text text-muted" style="color:red !important" >@error('name') {{$message}} @enderror</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">phone</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                    <small class="form-text text-muted" style="color:red !important" >@error('phone') {{$message}} @enderror</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                    <small class="form-text text-muted" style="color:red !important" >@error('email') {{$message}} @enderror</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="text-input" name="image"  class="form-control @error('image') is-invalid @enderror" >
                                    <small class="form-text text-muted" style="color:red !important" >@error('image') {{$message}} @enderror</small></div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Department</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="department_id" id="select" class="form-control">
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id}} " @if($department->id == old('department_id')) selected @endif>{{ $department->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">
                                    <i class="fa fa-dot-circle-o"></i> Add
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection