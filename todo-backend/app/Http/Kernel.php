protected $routeMiddleware = [
// ...
'jwt.auth' => \App\Http\Middleware\JwtMiddleware::class,
];
protected $routeMiddleware = [
// autres middlewares...
'jwt.auth' => \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
];
protected $routeMiddleware = [
'auth' => \App\Http\Middleware\Authenticate::class,
// ...
];