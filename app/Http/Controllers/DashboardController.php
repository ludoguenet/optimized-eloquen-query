<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');

        $employees = User::query()
            ->selectRaw('users.*, projects.start_at')
            ->join('projects', 'users.project_id', '=', 'projects.id')
            ->when($sort === 'start_at', fn (Builder $query) => $query->orderByRaw("date_format(start_at, '%m-%d') $direction"))
            ->withCasts([
                'start_at' => 'date',
            ])
            ->get();

        // $employees = User::query()
        //     ->selectRaw('users.*, projects.start_month_day')
        //     ->join('projects', 'users.project_id', '=', 'projects.id')
        //     ->when($sort === 'start_at', fn (Builder $query) => $query->orderBy("start_month_day", $direction))
        //     ->get();

        return view('dashboard', compact('employees'));
    }
}
