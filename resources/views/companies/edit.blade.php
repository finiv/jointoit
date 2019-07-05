@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $company->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $company->email }}"/>
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" value="{{ $company->website }}"/>
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" accept="image/*" class="form-control" name="logo" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}">
            </form>
        </div>
    </div>
@endsection
