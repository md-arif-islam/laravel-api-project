<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller {

    public function getAllArticles() {
        return Article::all();
    }

    public function getArticle( $id ) {
        return Article::findOrFail( $id );
    }

    public function createArticle( Request $request ) {
        $title = $request->title;
        $content = $request->content;
        $user = $request->user();

        $article = new Article();
        $article->title = $title;
        $article->content = $content;
        $article->user_id = $user->id;
        $article->save();

        return $article;
    }

    public function updateArticle( Request $request, Article $article ) {
        $user = $request->user();
        if ( $user->id != $article->user_id ) {
            return response()->json( [
                "error" => "You don't have permission to edit this article!",
            ], 404 );
        } else {
            $title = $request->title;
            $content = $request->content;
            if ( !empty( $title ) ) {
                $article->title = $title;
            }
            if ( !empty( $content ) ) {
                $article->content = $content;
            }
            $article->save();

            return $article;

        }
    }

    public function deleteArticle( Request $request, Article $article ) {
        $user = $request->user();
        if ( $user->id != $article->user_id ) {
            return response()->json( [
                "error" => "You don't have permission to delete this article!",
            ], 404 );
        } else {

            $article->delete();
            return response()->json( [
                "success" => "Article deleted successfully!",
            ], 200 );
        }
    }

}
