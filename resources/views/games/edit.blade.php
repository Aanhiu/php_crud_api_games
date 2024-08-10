@extends('layouts')

@section('content')
    <h1>Them moi game</h1>


    <form action="{{route('update' , ['game'=>$game])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">title name la nham</label>
        <input type="text" name="name" placeholder="name" class="form-control" value="{{ old('name') ?? $game->name }}">
        <div>
            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <label for="">cover_art</label>
        <input type="file" name="cover_art" placeholder="cover_art" class="form-control">
        <div>
            @error('cover_art')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <label for="">developer</label>
        <input type="text" name="developer" placeholder="developer" class="form-control" value="{{ old('developer') ?? $game->developer }}">
        <div>
            @error('developer')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">release_year</label>
        <input type="number" name="release_year" placeholder="release_year" class="form-control" value="{{ old('release_year') ?? $game->release_year}}">
        <div>
            @error('release_year')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">genre</label>
        <input type="text" name="genre" placeholder="genre" class="form-control" value="{{ old('genre') ?? $game->genre }}">
        <div>
            @error('genre')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <input type="submit" value="Cap nhat" class="btn btn-primary m-3">
    </form>
@endsection
