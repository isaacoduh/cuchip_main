@extends('client.layouts')

@section('title','Users')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Users</i>
                    <span class="pull-right"><a href="/clientdashboard">Back</a></span>
                </div>
                <div class="panel-body">
                    @if($users->isEmpty())
                        <p>There are currently no Users</p>
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
                                 @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
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