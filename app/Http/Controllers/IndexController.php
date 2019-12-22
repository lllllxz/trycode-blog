<?php

namespace App\Http\Controllers;

use App\Enums\PicturePosition;
use App\Enums\Status;
use App\Models\Picture;

class IndexController extends Controller
{
    public function index()
    {
        $images = Picture::where('status' ,Status::ENABLE)
            ->whereIn('position', [PicturePosition::INDEX_HEAD, PicturePosition::HIGHLY_RECOMMENTED])
            ->orderBy('order','DESC')
            ->get()
            ->groupBy('position')->toArray();

        $data = [
            'images' => $images[PicturePosition::INDEX_HEAD],
            'recommented' => $images[PicturePosition::HIGHLY_RECOMMENTED],
            'images_length' => count($images[PicturePosition::INDEX_HEAD])
        ];
        return view('index.index', ['data' => $data]);
    }
}
