@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <a href="{!! route('fruits.create')!!}" class="btn btn-info">Buat Data</a>
        <div class="card-body">


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Introduction</th>
            <th>Location</th>
            <th>Amount</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($fruits as $fruit)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $fruit->name }}</td>
                <td>{{ $fruit->introduction }}</td>
                <td>{{ $fruit->location }}</td>
                <td>{{ $fruit->cost }}</td>
                <td>{{ date_format($fruit->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('fruits.destroy', $fruit->id) }}" method="POST">

                        <a href="{{ route('fruits.show', $fruit->id) }}" title="show" class="btn btn-success">Lihat</a>

                        <a href="{{ route('fruits.edit', $fruit->id) }}" class="btn btn-warning">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
</div>

    {!! $fruits->links() !!}

@endsection
