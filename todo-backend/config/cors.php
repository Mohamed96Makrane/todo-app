<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Les chemins qui accepteront les requêtes cross-origin. Ici, on autorise
    | toutes les routes API.
    |
    */
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    |--------------------------------------------------------------------------
    | Méthodes autorisées
    |--------------------------------------------------------------------------
    |
    | '*' permet toutes les méthodes HTTP : GET, POST, PUT, DELETE, etc.
    |
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Origines autorisées
    |--------------------------------------------------------------------------
    |
    | Remplacez par l'URL de votre frontend. Ici, localhost:5173 pour Vue.js
    |
    */
    'allowed_origins' => ['http://localhost:5173'],

    /*
    |--------------------------------------------------------------------------
    | Modèles d'origines autorisés
    |--------------------------------------------------------------------------
    |
    | Permet d'utiliser des regex sur les origines si nécessaire.
    |
    */
    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Headers autorisés
    |--------------------------------------------------------------------------
    |
    | '*' autorise tous les headers (Content-Type, Authorization…)
    |
    */
    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Headers exposés
    |--------------------------------------------------------------------------
    |
    | Ces headers seront accessibles depuis le frontend.
    |
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Durée en secondes pour laquelle le cache des preflight requests est valide.
    |
    */
    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Support des credentials
    |--------------------------------------------------------------------------
    |
    | true si vous envoyez cookies ou Authorization headers.
    |
    */
    'supports_credentials' => false,

];
