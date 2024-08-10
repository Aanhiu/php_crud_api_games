@extends('layouts')

@section('content')
    <h1>Danh sach Game</h1>
    <a href="{{route('add')}}" class="nav-link">➕ Them moi game</a>
    <table border=1 class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>cover_art</th>
                <th>developer</th>
                <th>relase_year</th>
                <th>genre</th>
                <th>Action</th>
            </tr>

            @foreach ($getlistGame as $game)
        <tbody>
            <tr>
                <td> {{ $game->id }} </td>
                <td> {{ $game->name }} </td>
                <td> {{ $game->cover_art }} </td>
                <td> {{ $game->developer }} </td>
                <td> {{ $game->release_year }} </td>
                <td> {{ $game->genre }} </td>

                <td>
                   <a href="{{route('edit' , ['game' => $game])}}"><button class="btn btn-danger">Edit</button></a>
                   {{-- <a href=""><button class="btn btn-danger">Xóa</button></a> --}}
                   <form action="{{route('delete' , $game->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Xoa chu')">Xóa</button>
                   </form>
                    
                </td>
            </tr>
        </tbody>
        @endforeach

        </thead>
    </table>
@endsection
