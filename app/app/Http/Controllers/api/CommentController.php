<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCommentResource;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function show($id)
    {
        /*
            i know requests in the controller is a bad idea.
            it would be time I would put in the repository
        */


        //Query Builder implement 7.1
        $comments = DB::table('users')
            ->where('users.id', $id)
            ->join('comments AS c', 'c.commentator_id', '=', 'users.id')
            ->join('posts AS p', function ($join) {
                $join->on('p.author_id', '=', 'c.commentator_id')
                ->where('p.image_id', '<>', null);
            })
            ->select(['c.id', 'c.post_id', 'c.commentator_id', 'c.content', 'c.created_at'])
            ->orderBy('c.created_at', 'DESC')
            ->get();


        //Raw query implement 7.1
        $comments = DB::select(DB::raw(
            "SELECT c.id, c.post_id, c.commentator_id, c.content, c.created_at FROM users
                  JOIN comments AS c ON c.commentator_id = users.id
                  JOIN posts AS p ON p.author_id = c.commentator_id
                  AND p.image_id IS NOT NULL
                  WHERE users.id = :user_id
                  ORDER BY c.created_at DESC"
        ), ['user_id' => $id]);

        //implement 7.2
        $posts = DB::table('comments')
            ->where('commentator_id', $id)
            ->select(['id', 'post_id', 'commentator_id', 'content', 'created_at'])
            ->get();

        $arrayPostIds = json_decode(json_encode($posts), true);
        $arrayPostIds = array_column($arrayPostIds, 'post_id');
        $comments = DB::table('posts')
            ->whereIn('posts.id', $arrayPostIds)
            ->where('image_id', '<>', null)
            ->get();

        foreach ($comments as &$comment) {
            foreach ($posts as $post) {
                if ($post->post_id === $comment->id) {
                    $imageUrl = DB::table('images')
                        ->where('id', $comment->image_id)
                        ->value('url');
                    $post->image = $imageUrl;
                    //implement 7.2.1
                    if ($author = DB::table('users')
                        ->where('id', $post->commentator_id)
                        ->where('active', true)
                        ->first(['id', 'name', 'email', 'created_at'])) {
                        $post->author = $author;
                    }
                    $comment->post = $post;
                }
            }
        }

        return new UserCommentResource(User::where('id', $id)->get());
    }
}
