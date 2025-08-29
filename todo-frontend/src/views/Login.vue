<template>
  <div class="page-container">
    <div class="login-container">
      <button class="btn-back" @click="goBack">← Retour</button>
      <h2>Connexion</h2>
      <p class="subtitle">Connectez-vous pour gérer vos tâches facilement</p>
      <form @submit.prevent="submit" class="login-form">
        <label for="email">Email</label>
        <input v-model="email" type="email" id="email" placeholder="Votre email" required />

        <label for="password">Mot de passe</label>
        <input v-model="password" type="password" id="password" placeholder="Votre mot de passe" required />

        <button type="submit" class="btn-login">Se connecter</button>
      </form>
    </div>
  </div>
</template>

<script>
import { useUserStore } from '../stores/user'

export default {
  data() {
    return { email: '', password: '' }
  },
  setup() {
    const userStore = useUserStore()
    return { userStore }
  },
  methods: {
    async submit() {
      try {
        await this.userStore.login({ email: this.email, password: this.password })
        alert('Connexion réussie !')
        this.$router.push('/tasks')
      } catch (error) {
        alert(error.response?.data?.error || 'Erreur lors de la connexion')
      }
    },
    goBack() {
      window.history.back()
    }
  }
}
</script>

<style scoped>
.page-container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Poppins', Arial, sans-serif;
  background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
  padding: 1rem;
}

.login-container {
  width: 380px;
  padding: 2.5rem;
  border-radius: 12px;
  background-color: #ffffff;
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  position: relative;
  text-align: center;
}

.btn-back {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0.4rem 0.8rem;
  background-color: #6c757d;
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-back:hover {
  background-color: #5a6268;
  transform: translateY(-2px);
}

.login-container h2 {
  margin-bottom: 0.5rem;
  color: #222;
  font-size: 2rem;
}

.subtitle {
  margin-bottom: 2rem;
  font-size: 1rem;
  color: #555;
}

.login-form {
  display: flex;
  flex-direction: column;
}

.login-form label {
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: #333;
}

.login-form input {
  padding: 0.7rem;
  margin-bottom: 1.5rem;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1rem;
  transition: all 0.3s;
}

.login-form input:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0,123,255,0.5);
  outline: none;
}

.btn-login {
  padding: 0.8rem;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-login:hover {
  background-color: #0056b3;
  transform: translateY(-2px) scale(1.03);
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 420px) {
  .login-container {
    width: 100%;
    padding: 2rem 1rem;
  }
}
</style>
