@extends('template.base')

@section('title', 'Dettaglio')



@section('content')


    <div class="row justify-content-center">
        <h1 class="mb-5 text-center">{{ $activity['title'] }}</h1>



        <div class="col-md-5">
            @session('update_successer')
                <div class="alert alert-success" role="alert">
                    The {{ session('update_successer')->title }} has been successfully modified!
                </div>
            @endsession
            <div class="card">
                <img src="{{ $activity['img'] }}" class="card-img-top" alt="activity">
                <div class="card-body">

                    <p class="card-text">Price: £ {{ $activity['price'] }} </p>


                    @auth
                        @if (Auth::user()->id === $activity->user_id)
                            <form action="{{ route('activities.destroy', ['activity' => $activity]) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger"><i class="bi bi-trash text-black"></i></button>

                            </form>
                        @endif
                    @endauth


                </div>
            </div>
        </div>
    </div>


@endsection
