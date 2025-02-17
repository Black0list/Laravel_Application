## **`02/17/2025`**
> J'ai appris comment creer un projet laravel avec une version specifie :
- Exemple : ``composer create-project laravel/laravel Laravel_Application "9.*" ``

> J'ai appris egalement les commandes make.Comment acceder au menu d'aide :
- Exemple : ``php artisan make help || php artisan make:model --help``

> Aussi j'ai fai la connection  avec la base de donnees ``PostgreSql`` en modifiant `.env` File

> Ajouter un Vue (ajouter un Route) : <br>
>``Route::view('/about', 'about')`` Aussi Passation des parametres ``Route::get('/contact/{name}', function (string $name) {
    return view('contact', ['name' => $name]);
});``
- Requets Route Disponible : 
> -Route:get($uri, $callback);<br>-Route:post($uri, $callback);<br>Same for put, delete, patch, options , aussi Route::match => les routes li katmatchi les route mathodes. Routes::match(['get', 'post'],$uri, $callback)




