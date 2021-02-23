@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <a href="{!! route('hidroponiks.create')!!}" class="btn btn-info">Buat Data</a>
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
        @foreach ($hidroponiks as $hidroponik)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $hidroponik->name }}</td>
                <td>{{ $hidroponik->introduction }}</td>
                <td>{{ $hidroponik->location }}</td>
                <td>{{ $hidroponik->cost }}</td>
                <td>{{ date_format($hidroponik->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('hidroponiks.destroy', $hidroponik->id) }}" method="POST">

                        <a href="{{ route('hidroponiks.show', $hidroponik->id) }}" title="show" class="btn btn-success">Lihat</a>

                        <a href="{{ route('hidroponiks.edit', $hidroponik->id) }}" class="btn btn-warning">Edit</a>

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

    {!! $hidroponiks->links() !!}

@endsection
