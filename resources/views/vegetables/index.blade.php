@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <a href="{!! route('vegetables.create')!!}" class="btn btn-info">Buat Data</a>
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
        @foreach ($vegetables as $vegetable)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $vegetable->name }}</td>
                <td>{{ $vegetable->introduction }}</td>
                <td>{{ $vegetable->location }}</td>
                <td>{{ $vegetable->cost }}</td>
                <td>{{ date_format($vegetable->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('vegetables.destroy', $vegetable->id) }}" method="POST">

                        <a href="{{ route('vegetables.show', $vegetable->id) }}" title="show" class="btn btn-success">Lihat</a>

                        <a href="{{ route('vegetables.edit', $vegetable->id) }}" class="btn btn-warning">Edit</a>

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

    {!! $vegetables->links() !!}

@endsection
