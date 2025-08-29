<template>
  <div class="notifications-container">
    <h2>Notifications</h2>
    <ul>
      <li v-for="note in notificationStore.notifications" :key="note.id">
        {{ note.message }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useNotificationStore } from '../stores/notifications'
const notificationStore = useNotificationStore()
</script>

<style scoped>
.notifications-container {
  max-width: 500px;
  margin: 2rem auto;
  padding: 1rem;
  border-radius: 8px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
}
.notifications-container ul {
  list-style: none;
  padding: 0;
}
.notifications-container li {
  padding: 0.5rem 1rem;
  margin-bottom: 0.5rem;
  background-color: #007bff;
  color: white;
  border-radius: 5px;
}
</style>
