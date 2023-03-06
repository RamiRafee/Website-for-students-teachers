@extends('admin.layouts.master')
@section('title','Students')
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
                        <strong class="card-title">Students</strong>
                    </div>
                    <div class="card-body">
                        @if(Session::has('msg'))
                                <div class='alert alert-success'>{{Session::get('msg')}}</div>
                            @endif
                            @if(Session::has('danger'))
                                <div class='alert alert-danger'>{{Session::get('danger')}}</div>
                            @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id }}</th>
                                    <td>{{$student->name }}</td>
                                    <td>{{$student->email }}</td>
                                    <td>{{$student->phone }}</td>
                                    <td>{{$student->department->name}}</td>
                                    
                                    <td>
                                        <a href="{{route('students.show' , ['student'=>$student->id])}}" style="color:lightblue">show</a>
                                        <a href="{{route('students.edit' , ['student'=>$student->id])}}" style="color:lightgreen">edit</a>
                                        <form action="{{route('students.destroy',$student->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value='delete'>
                                        </form>
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
</div>
@endsection