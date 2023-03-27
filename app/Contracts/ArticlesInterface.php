<?php
namespace App\Contracts;

use Illuminate\Http\Request;

interface ArticlesInterface
{
   public function userDeps();

   public function parameters($id);

   public function addArticlePage($id);

   public function storeArticle(Request $request);

   public function editArticlePage(int $slider_id);

   public function updateArticle(Request $request);

   public function deleteArticle(Request $request);

   public function searchArticles(Request $request);
}
