import { defineStore } from 'pinia'
import api from '../services/api'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    token: localStorage.getItem('token') || null
  }),
  actions: {
    async login(email, password) {
      const res = await api.post('/auth/login', { email, password })
      this.token = res.data.token
      localStorage.setItem('token', this.token)
      this.user = res.data.user
    },
    async register(data) {
      const res = await api.post('/auth/register', data)
      this.token = res.data.token
      localStorage.setItem('token', this.token)
      this.user = res.data.user
    },
    logout() {
      this.token = null
      this.user = null
      localStorage.removeItem('token')
    }
  }
})
