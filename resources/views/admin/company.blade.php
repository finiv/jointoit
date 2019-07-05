@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    <table>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>website</th>
            <th>logo</th>
        </tr>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>{{ $company->logo }}</td>
        </tr>
    @endforeach
    </table>



@stop
