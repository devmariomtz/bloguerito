<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\PaginatorHelper;

class HomeController extends Controller
{
    public function home()
    {
        // optenemos las noticias con la funcion getNews
        $news = $this->getNews(new Request());

        // retornamos la vista home con las noticias
        return view('home', compact('news'));
    }

    public function getNews(Request $request)
    {
        $palabra = $request->palabra ?? 'global';
        // optenemos las noticias previamente de la NEWS API
        $api = env('NEWS_API') . "everything?q=$palabra&apiKey=" . env('API_KEY');
        // hacemos la consulta a la API y convertirlo en un objeto, ademas de paginarlo
        $news = Http::get($api);
        // por cada articulo de la respuesta, verificamos que dentro de ese articulo dentro de source la propiedad id no sea null y que name no sea [Removed]
        $articulos = collect($news['articles'])->filter(function ($article) {
            return $article['source']['id'] != null && $article['source']['name'] != '[Removed]';
        });
        // agregamos el autor a cada articulo dentro de la colección articles
        $articulos = $articulos->map(function ($article) {
            $article['author'] = $this->setAutor($article);
            return $article;
        });
        // paginamos las noticias
        $articulos = PaginatorHelper::paginate($articulos);
        // retornamos la vista home con las noticias
        return $articulos;
    }

    private function setAutor($new)
    {
        // obtenemos un autor rando de la USERS_API
        $api = env('USERS_API');
        $autor = Http::get($api);
        // retornamos la noticia con el autor
        return $autor['results'][0];
    }

    public function showUser(Request $request)
    {
        $user = json_decode($request->author);
        return view('user_info', compact('user'));
    }
}

