<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagListController extends Controller
{
    public function tagList()
    {
        $tagsWithCount = Tag::withCount('users')->paginate(10);

        return view('tag_list', ['tagsWithCount' => $tagsWithCount]);
    }
}
