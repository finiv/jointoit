@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Add new Employee</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('employees.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control" name="website"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company:</label>
                        <select name="company_id" id="company_id">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
@endsection
