<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getlistGame = Game::all();
        //dd($getlistGame);
        return view('games.list', compact('getlistGame'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('games.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valida bắt lỗi 
        $request->validate([
            'name' => 'required',
            'cover_art' => 'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ]);

        // khoi tạo đối tượng $game new Game
        $game = new Game();
        // lấy $request các côi gia tri = name
        // file phải xử lí lấy các cái khác như nhau

        $game->name = $request->name;

        // xu li upload file
        $file = $request->file('cover_art');
        $pathname = rand(100000, 999999) . '-' . $file->getClientOriginalName();
        $file->storeAs('/public/uploads', $pathname);
        $game->cover_art = $pathname;
        $game->developer = $request->developer;
        $game->release_year = $request->release_year;
        $game->genre = $request->genre;

        // luu 
        $game->save();
        // chuyen huong ve list
        return redirect()->route('list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        // 
        return view('games.edit', compact('game'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        // 
        $request->validate([
            'name' => 'required',
            //'cover_art'=>'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ]);

        // lay cac thong tin thay doi va cap nhat
        $game->name = $request->name;

        // xu li anh
        $file = $request->file('cover_art');

        // neu thay doi file moi xoa file cu di o upload 
        if ($file) {

            Storage::delete('/public/uploads/'. $game->cover_art);
            // viet upload file moi nhu binh thuong
            $pathname = rand(100000, 999999) . '_' . $file->getClientOriginalName();
            $file->storeAs('/public/uploads', $pathname);
            $game->cover_art = $pathname;
        }

        $game->developer = $request->developer;
        $game->release_year = $request->release_year;
        $game->genre = $request->genre;

        $game->save();
        return redirect()->route('list');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function delete(Game $game)
    {
        //
        $game->delete();
        return redirect()->route('list');
    }
}
