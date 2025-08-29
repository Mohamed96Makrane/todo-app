import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useNotificationStore = defineStore('notifications', () => {
  const notifications = ref([])

  function addNotification(message) {
    notifications.value.push({
      id: Date.now(),
      message
    })

    // Supprime après 5 secondes
    setTimeout(() => {
      notifications.value.shift()
    }, 5000)
  }

  return { notifications, addNotification }
})
