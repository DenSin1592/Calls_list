@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="header-h1-main">
            <h1>Список звонков</h1>
        </div>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item"><a href="{{route('main')}}">Общий список</a></li>
            <li class="list-group-item"><a href="{{route('main')}}">Избранное</a></li>
        </ul>
    </div>
    <br>
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($contacts as $contact)
                <li class="list-group-item ">
                    {{$contact->name}} /// {{$contact->phone}} ///

                    <form method="post" action="{{route('toFavorites')}}">
                        @csrf

                        <input type="hidden" name="id" value={{$contact->id}}>

                        <input type="submit" value="В Избранное" class="btn btn-primary" style="display: block; margin-left: auto;">
                    </form>

                </li>
                @endforeach
            </ul>
            <br>
            <div class="row align-items-center justify-content-center text-center">
                {{$contacts->links()}}
            </div>

        </div>
    </div>

@endsection
