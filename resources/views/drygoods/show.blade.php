@extends('layouts.app')


@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <a href="{!! route('drygoods.index')!!}" class="btn btn-info">Kembali</a>
        <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $drygood->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Introduction:</strong>
                {{ $drygood->introduction }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $drygood->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $drygood->cost }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ date_format($drygood->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
            </div>
            </div>
        </div>
    </div>
    
@endsection
