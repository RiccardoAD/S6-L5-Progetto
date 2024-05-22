@extends('template.base')

@section('title', 'Modifica Attività')



@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5 mb-4">Edit Activity</h2>


            <form method="POST" action="{{ route('activities.update', ['activity' => $activity->id]) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo dell'attività"
                        name="title" value="{{ $activity->title }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Prezzo" name="price"
                        value="{{ $activity->price }}">
                </div>

                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="text" class="form-control" id="img" placeholder="Indirizzo dell'immagine"
                        name="img" value="{{ $activity->img }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Activity</button>
            </form>



        </div>
    </div>

@endsection
