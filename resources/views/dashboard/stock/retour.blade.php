@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')

@include('dashboard.stock.inc.header')

<div class="content-wrapper p-4">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-body text-left">
                <table class="table table-striped datatable entreetable text-right">
                    <thead>
                        <tr>
                            <th><b> التاريخ </b></th>
                            <th><b> المنتوج </b></th>
                            <th><b> المدينة </b></th>
                            <th><b> الكمية </b></th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($retour as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->city->name }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

