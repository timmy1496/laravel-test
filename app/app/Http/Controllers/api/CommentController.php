<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserComment;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($id)
    {
        return new UserComment(User::where('id', $id)->get());
    }
}
