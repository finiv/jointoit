@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Add new Company</h1>
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
                <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control" name="website"/>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" accept="image/*" class="form-control" name="logo"/>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Add Company</button>
                </form>
            </div>
        </div>
    </div>
@endsection
