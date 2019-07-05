@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div>
            <a style="margin: 19px;" href="{{ route('employees.create')}}" class="btn btn-primary">New employee</a>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Company</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                        <td>
                            <a href="mailto:{{ $employee->email }}">
                                {{$employee->email}}
                            </a>
                        </td>
                        <td>
                            <a href="tel:{{$employee->phone}}">
                                {{$employee->phone}}
                            </a>
                        </td>
                        <td>
                            <a href="{{ $employee->website }}">
                                {{ $employee->company_name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
