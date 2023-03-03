<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller {

    public function getAllArticles() {
        return Article::all();
    }

    public function getArticle( $id ) {
        return Article::findOrFail( $id );
    }
}
