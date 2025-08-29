import { defineStore } from 'pinia'
import api from '../services/api'

export const useTaskStore = defineStore('tasks', {
  state: () => ({
    tasks: []
  }),
  actions: {
    async fetchTasks() {
      const res = await api.get('/tasks')
      this.tasks = res.data
    },
    async createTask(data) {
      const res = await api.post('/tasks', data)
      this.tasks.push(res.data)
    },
    async updateTask(id, data) {
      const res = await api.put(`/tasks/${id}`, data)
      const index = this.tasks.findIndex(t => t.id === id)
      if(index !== -1) this.tasks[index] = res.data
    },
    async deleteTask(id) {
      await api.delete(`/tasks/${id}`)
      this.tasks = this.tasks.filter(t => t.id !== id)
    }
  }
})
