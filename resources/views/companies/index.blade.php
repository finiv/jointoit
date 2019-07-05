@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
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
            <a style="margin: 19px;" href="{{ route('companies.create')}}" class="btn btn-primary">New company</a>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Website</td>
                    <td>Logo</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>
                            <a href="mailto:{{ $company->email }}">
                                {{$company->email}}
                            </a>
                        </td>
                        <td>
                            <a href="{{ $company->website }}">
                                {{ $company->website }}
                            </a>
                        </td>
                        <td>
                            <img height="100px" width="100px" src="{{ asset($company->logo) }}"
                                 alt="{{ $company->name }}">
                        </td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id)}}" method="post">
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
            {{ $companies->links() }}
        </div>
    </div>
@endsection
