import Echo from 'laravel-echo'
import Pusher from 'pusher-js'

window.Pusher = Pusher

const echo = new Echo({
  broadcaster: 'pusher',
  key: 'YOUR_PUSHER_KEY',
  cluster: 'YOUR_PUSHER_CLUSTER',
  forceTLS: true,
  auth: {
    headers: {
      Authorization: `Bearer ${localStorage.getItem('token')}`
    }
  }
})

export default echo
