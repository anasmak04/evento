<?php

namespace App\Http\Controllers\organizer\category;

use App\Models\Category;

class OrganizerCategoryController
{

    public function index()
    {
        $categories = Category::all();
        return view("organizer.dashboard.category.index" , compact("categories"));
    }
}
