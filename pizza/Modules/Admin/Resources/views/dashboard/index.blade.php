@extends('admin::layouts.master')

@section('page_title')
    Dashboard
@stop

@section('content-wrapper')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>

            <div class="page-action">
                <date-filter></date-filter>
            </div>
        </div>

        <div class="page-content">
        </div>
    </div>
@stop