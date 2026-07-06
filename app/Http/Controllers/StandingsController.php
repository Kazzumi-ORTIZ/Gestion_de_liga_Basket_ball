<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        $standings = $teams->map(function ($team) {
            $homeGames = $team->homeGames()->where('status', 'jugado')->get();
            $awayGames = $team->awayGames()->where('status', 'jugado')->get();

            $wins = $homeGames->filter(fn($g) => $g->home_score > $g->away_score)->count()
                  + $awayGames->filter(fn($g) => $g->away_score > $g->home_score)->count();

            $losses = $homeGames->filter(fn($g) => $g->home_score < $g->away_score)->count()
                   + $awayGames->filter(fn($g) => $g->away_score < $g->home_score)->count();

            $played = $wins + $losses;
            $points = ($wins * 2) + ($losses * 1);

            return [
                'equipo' => $team->name,
                'jugados' => $played,
                'ganados' => $wins,
                'perdidos' => $losses,
                'puntos' => $points,
            ];
        });

        $standings = $standings->sortByDesc('puntos')->values();

        return view('standings.index', compact('standings'));
    }
}