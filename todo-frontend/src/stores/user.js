import { defineStore } from 'pinia'
import axios from 'axios'

export const useUserStore = defineStore('user', {
  state: () => ({
    user: null,
    token: localStorage.getItem('token') || null,
  }),
  actions: {
    // Inscription
    async register(formData) {
      try {
        const response = await axios.post('http://localhost:8000/api/auth/register', formData)
        this.user = response.data.user || null
        this.token = response.data.token
        localStorage.setItem('token', this.token)
        return response
      } catch (error) {
        throw error
      }
    },

    // Connexion
    async login(formData) {
      try {
        const response = await axios.post('http://localhost:8000/api/auth/login', formData)
        this.token = response.data.token
        localStorage.setItem('token', this.token)

        // Si le backend renvoie directement l'utilisateur dans login
        this.user = response.data.user || null

        return response
      } catch (error) {
        throw error
      }
    },

    // Déconnexion
    logout() {
      this.user = null
      this.token = null
      localStorage.removeItem('token')
    }
  }
})
