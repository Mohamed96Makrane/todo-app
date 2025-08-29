# To-Do App

Application de gestion de tâches avec Vue.js, Pinia, Laravel et notifications en temps réel avec Pusher.  

Pour cloner et tester le projet, utilisez : `git clone https://github.com/Mohamed96Makrane/todo-app.git` puis `cd todo-app`. 
Pour le backend Laravel, allez dans le dossier `backend`, installez les dépendances avec `composer install`, copiez `.env.example` en `.env`, générez la clé avec `php artisan key:generate`, 
configurez la base de données dans `.env` (DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=todo_app, DB_USERNAME=root, DB_PASSWORD=), 
créez la base de données avec `CREATE DATABASE todo_app;` puis lancez les migrations avec `php artisan migrate` et démarrez le serveur avec `php artisan serve` 
(backend disponible sur http://localhost:8000). Pour le frontend Vue.js, allez dans le dossier `frontend`, installez les dépendances avec `npm install`, 
configurez l’URL de l’API dans `.env` avec `VITE_API_URL=http://localhost:8000/api` puis lancez le serveur de développement avec `npm run dev` (frontend disponible sur http://localhost:5173). 
Ouvrez le frontend dans votre navigateur, créez un compte ou connectez-vous, ajoutez, modifiez et supprimez des tâches, et testez les notifications si Pusher est configuré. 
Assurez-vous que le backend est lancé avant le frontend.  

Made  by Mohamed96Makrane
