<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCommentResource;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($id)
    {
        return new UserCommentResource(User::where('id', $id)->get());
    }
}
