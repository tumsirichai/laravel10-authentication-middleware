<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\Api\PostStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *      path="/posts",
     *      operationId="getPostsList",
     *      tags={"Posts"},
     *      summary="Get list of posts",
     *      description="Returns list of posts",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(name="page", in="query", description="the page number", required=false,
     *        @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return Post::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/posts",
     *      operationId="storePost",
     *      tags={"Posts"},
     *      summary="Store new post",
     *      description="Returns post data",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(),
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                type="object",
     *                required={"category_id","title","slug", "detail", "status"},
     *                @OA\Property(property="category_id", type="text", default="1"),
     *                @OA\Property(property="title", type="text"),
     *                @OA\Property(property="slug", type="text"),
     *                @OA\Property(property="detail", type="textarea"),
     *                @OA\Property(property="status", type="text", default="active")
     *             ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create([
        'user_id' => 2,
        'title' => $request->title,
        'category_id' => $request->category_id,
        'slug' => $request->slug,
        'detail' => $request->detail,
        'status' => $request->status
        ]);

        return new PostResource($post);
    }


    /**
     * @OA\Get(
     *      path="/posts/{id}",
     *      operationId="getPostById",
     *      tags={"Posts"},
     *      summary="Get post information",
     *      description="Returns post data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/posts/{id}",
     *      operationId="updatePost",
     *      tags={"Posts"},
     *      summary="Update existing post",
     *      description="Returns updated post data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(),
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                type="object",
     *                required={"category_id","title","slug", "detail", "status"},
     *                @OA\Property(property="category_id", type="text", default="1"),
     *                @OA\Property(property="title", type="text"),
     *                @OA\Property(property="slug", type="text"),
     *                @OA\Property(property="detail", type="textarea"),
     *                @OA\Property(property="status", type="text", default="active")
     *             ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, string $id)
    {
        //
    }

     /**
     * @OA\Delete(
     *      path="/posts/{id}",
     *      operationId="deletePost",
     *      tags={"Posts"},
     *      summary="Delete existing post",
     *      description="Deletes a record and returns no content",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
