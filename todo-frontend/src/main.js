import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import router from './router'      // <-- ajouter cette ligne
import { createPinia } from 'pinia'
import Echo from 'laravel-echo'
import Pusher from 'pusher-js'

const app = createApp(App)
app.use(router)
app.use(createPinia())
app.mount('#app')
