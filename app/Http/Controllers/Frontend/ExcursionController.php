<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Excursion;
use App\Models\ExcursionImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{

    public function index(): View
    {
        return view('frontend.pages.excursions');
    }

    public function single($id): View
    {
        $excursion = Excursion::findOrFail($id);

        return view('frontend.pages.excursion-single', compact('excursion'));
    }
}
