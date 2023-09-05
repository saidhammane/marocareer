@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th scope="col">Number</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataEmailSubscriptions as $item)
                    {{-- @php $increment = $loop->iteration; @endphp --}}
                    <tr id="row-{{$item->id}}">
                        {{-- <th scope="row"> {{ $increment }} </th> --}}
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><button data-id="{{ $item->id }}" class="btn btn-danger delete-button">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    <script>
        
    </script>
@endsection
