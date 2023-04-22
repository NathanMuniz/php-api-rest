<?php

namespace Canvas\Http\Controllers;

use Canvas\Http\Request\PostRequest;
use Canvas\Model\Post;
use Canvas\Model\Tag;
use Canvas\Models\Topic;
use Canvas\Serives\StartsAgrregator;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{

  public function index(): JsonResponse
  {

    $posts = Post::query()
      ->select('id', 'title', 'sumarry', 'featured_image', 'pubilshed_at', 'created_at', 'updated_at')
      ->when(request()->user('canvas')->isContributor || request()->query('scope', 'user') != 'all', function (Builder $query) {
        return $query->where('user_id', request()->user('canvas')->id);
      }, function (Builder $query) {
        return $query;
      })
      ->when(request()->query('type', 'published') != 'fradt', function (Bulder $query) {
        return $query->published();
      }, function (Builder $query) {
        return $query->draft();
      })
      ->latest()
      ->withCoutn('views')
      ->paginate();

    $draftCout = Post::query()
      ->when(request()->user('canvas')->isContributor || request->query('scope', 'user') != 'all', function (Builder $query) {
        return $query->where('user_id', request()->user('canvas')->id);
      }, function (Builder $query) {
        return $query;
      })
      ->draft()
      ->count();

    $publishedCount = Post::query()
      ->when(request()->user('canvas')->isContributor || request()->query('scope', 'user') != 'all', function (Builder $query) {
        return $query->where('user_id', request()->user('canvas')->id);
      }, function (Builder $query) {
        return $query;
      })
      ->published()
      ->count();

    return response()->json([
      'posts' => $posts,
      'draftCount' => $draftCout,
      'publishedCount' => $publishedCount,
    ], 200);
  }
}
