@extends('template.base')

@section('title', 'Elenco')



@section('content')

    <h1 class="my-5 text-center">List of activities</h1>
    <div class="row justify-content-center mx-5">

        @session('create_successer')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> The activity was successfully created!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            {{-- <div class="alert alert-success" role="alert">
    The activity was successfully created!
  </div> --}}
        @endsession

        @session('delete_successer')
            <div class="alert alert-success" role="alert">
                The {{ session('delete_successer')->title }} has been deleted successfully!
            </div>
        @endsession


        {{-- Ciclo sulle attività e visualizzazione delle card --}}

        @forelse ($activities as $activity)
            <div class="col-12 col-md-3 mb-3 ">
                <div class="card h-100">
                    <img src={{ $activity['img'] }} class="card-img-top card-img" alt="attivity cover">

                    <div class="card-body d-flex flex-column ">
                        <div class="mb-auto">
                            <h5 class="card-title">Title: {{ $activity['title'] }}</h5>
                            <p class="card-text">Price: £ {{ $activity['price'] }}</p>


                        </div>

                        @auth

                            @if (Auth::user()->id === $activity->user_id)
                                <div class="d-flex flex-wrap justify-content-center mt-5">

                                    <a href="{{ route('activities.edit', ['activity' => $activity]) }}"
                                        class="btn btn-warning mb-3 me-2 "><i class="bi bi-pencil-square"></i></a>

                                    {{-- <a href="{{route ('activities.show', ['activity'=>$activity] )}}" class="btn btn-primary mb-3 mx-2">Dettails</a> --}}

                                    <form action="{{ route('activities.destroy', ['activity' => $activity]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn btn-danger"><i class="bi bi-trash text-black"></i></button>

                                    </form>

                                </div>
                            @endif
                        @endauth

                        <a href="{{ route('activities.show', ['activity' => $activity]) }}"
                            class="btn btn-primary mb-3 mx-2">Dettails</a>




                    </div>
                </div>
            </div>



        @empty
            <h2>Non ci sono attività disponibili</h2>
        @endforelse

        <div class="my-5 ">
            {{ $activities->links() }}
        </div>


    </div>



@endsection
