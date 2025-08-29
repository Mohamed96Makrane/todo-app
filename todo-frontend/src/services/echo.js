import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

export default (userId) => {
  return new Echo({
    broadcaster: 'pusher',
    key: 'your_app_key',       // Remplace par la clé Pusher de ton projet
    cluster: 'mt1',            // Remplace par ton cluster
    forceTLS: true
  }).private(`tasks.${userId}`);
};
