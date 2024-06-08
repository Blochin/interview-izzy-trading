<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartResource;
use App\Models\Part;
use Inertia\Inertia;

class PartController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Parts', [
            'parts' => PartResource::collection(Part::all())
        ]);
    }

    public function delete(Part $part)
    {
        $part->delete();
    }
}
