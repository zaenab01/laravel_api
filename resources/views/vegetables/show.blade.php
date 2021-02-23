@extends('layouts.app')


@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <a href="{!! route('vegetables.index')!!}" class="btn btn-info">Kembali</a>
        <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $vegetable->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Introduction:</strong>
                {{ $vegetable->introduction }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $vegetable->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $vegetable->cost }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ date_format($vegetable->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
            </div>
            </div>
        </div>
    </div>
    
@endsection
