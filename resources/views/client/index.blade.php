@extends('clients.layouts')

@section('title','All Clients')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Clients</i>
                </div>
                <div class="panel-body">
                    @if($clients->isEmpty())
                        <p>There are currently no Clients</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>
                                            {{ $client->name }}
                                        </td>
                                        <td>
                                            {{ $client->email }}
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection