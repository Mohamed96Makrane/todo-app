<template>
  <div class="tasks-container">
    <button class="btn-back" @click="goBack">← Retour</button>

    <h1>Mes tâches</h1>

    <form @submit.prevent="addTask" class="task-form">
      <input v-model="newTask.title" placeholder="Titre" required />
      <input v-model="newTask.description" placeholder="Description" />
      <button type="submit" class="btn-add">Ajouter</button>
    </form>

    <ul class="task-list">
      <li v-for="task in taskStore.tasks" :key="task.id" class="task-item">
        <div class="task-text">
          <!-- Mode édition -->
          <template v-if="editingTaskId === task.id">
            <input v-model="editTitle" placeholder="Titre" />
            <input v-model="editDescription" placeholder="Description" />
          </template>

          <!-- Mode affichage normal -->
          <template v-else>
            <div class="task-title">{{ task.title }}</div>
            <div class="task-description">{{ task.description }}</div>
          </template>

          <div class="task-status" :class="task.status">{{ task.status }}</div>
        </div>

        <div class="task-buttons">
          <button v-if="editingTaskId !== task.id" @click="deleteTask(task.id)" class="btn-delete">Supprimer</button>
          <button v-if="editingTaskId !== task.id" @click="toggleStatus(task)" class="btn-toggle">Changer statut</button>
          <button v-if="editingTaskId !== task.id" @click="startEdit(task)" class="btn-toggle">Modifier</button>
          <button v-if="editingTaskId === task.id" @click="saveEdit(task.id)" class="btn-toggle">Sauvegarder</button>
          <button v-if="editingTaskId === task.id" @click="cancelEdit" class="btn-delete">Annuler</button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useTaskStore } from '../stores/tasks'

const taskStore = useTaskStore()
const newTask = ref({ title: '', description: '' })

// Variables pour édition
const editingTaskId = ref(null)
const editTitle = ref('')
const editDescription = ref('')

onMounted(() => {
  taskStore.fetchTasks()
})

// Ajouter tâche
const addTask = async () => {
  if (!newTask.value.title) return
  await taskStore.createTask({ ...newTask.value })
  newTask.value.title = ''
  newTask.value.description = ''
}

// Supprimer tâche
const deleteTask = async (id) => {
  await taskStore.deleteTask(id)
}

// Changer statut
const toggleStatus = async (task) => {
  const newStatus = task.status === 'pending' ? 'completed' : 'pending'
  await taskStore.updateTask(task.id, { ...task, status: newStatus })
}

// Éditer une tâche
const startEdit = (task) => {
  editingTaskId.value = task.id
  editTitle.value = task.title
  editDescription.value = task.description
}

// Annuler édition
const cancelEdit = () => {
  editingTaskId.value = null
  editTitle.value = ''
  editDescription.value = ''
}

// Sauvegarder édition
const saveEdit = async (id) => {
  await taskStore.updateTask(id, { title: editTitle.value, description: editDescription.value })
  cancelEdit()
}

// Retour page précédente
const goBack = () => window.history.back()
</script>

<style scoped>
.tasks-container {
  max-width: 650px;
  margin: 3rem auto;
  padding: 2rem 2.5rem;
  border-radius: 15px;
  background: #ffffff;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  font-family: 'Poppins', Arial, sans-serif;
}

.btn-back {
  margin-bottom: 1rem;
  padding: 0.5rem 1rem;
  background-color: #6c757d;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: all 0.3s;
}
.btn-back:hover { background-color: #5a6268; transform: translateY(-2px); }

.tasks-container h1 {
  text-align: center;
  margin-bottom: 2rem;
  font-size: 2rem;
  color: #222;
}

.task-form {
  display: flex;
  gap: 0.5rem;
  margin-bottom: 1.5rem;
}
.task-form input {
  flex: 1;
  padding: 0.7rem;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 1rem;
  transition: all 0.3s;
}
.task-form input:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0,123,255,0.4);
  outline: none;
}
.btn-add {
  padding: 0.7rem 1.2rem;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}
.btn-add:hover {
  background-color: #0056b3;
  transform: translateY(-2px) scale(1.02);
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.task-list { list-style: none; padding: 0; }

.task-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.8rem 1rem;
  border-bottom: 1px solid #eee;
  border-radius: 8px;
  transition: all 0.3s;
  margin-bottom: 0.5rem;
  background: #f8f9fa;
}
.task-item:hover { background: #e9ecef; transform: translateY(-2px); }

.task-text { flex: 1; }
.task-title { font-weight: 600; color: #000; }
.task-description { font-size: 0.95rem; margin-top: 3px; color: #000; }
.task-status { margin-top: 4px; font-weight: bold; text-transform: capitalize; }
.task-status.pending { color: #ffc107; }
.task-status.completed { color: #28a745; }

.task-buttons { display: flex; gap: 0.5rem; }
.btn-delete, .btn-toggle {
  padding: 0.4rem 0.8rem;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}
.btn-delete { background-color: #dc3545; color: white; }
.btn-delete:hover { background-color: #c82333; transform: translateY(-2px); }
.btn-toggle { background-color: #28a745; color: white; }
.btn-toggle:hover { background-color: #218838; transform: translateY(-2px); }
</style>
