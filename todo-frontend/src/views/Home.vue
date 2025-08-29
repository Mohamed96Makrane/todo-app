<template>
  <div class="home-container">
    <h1>Bienvenue sur To-Do List</h1>
    <p class="subtitle">Gérez vos tâches efficacement et en temps réel</p>
    <div class="buttons">
      <router-link to="/login" class="btn btn-login">Se connecter</router-link>
      <router-link to="/register" class="btn btn-register">S’inscrire</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home'
}
</script>

<style scoped>
.home-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: 'Poppins', Arial, sans-serif;
  background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
  color: #fff;
  text-align: center;
  padding: 1rem;
}

.home-container h1 {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
}

.subtitle {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  color: #e0e0ff;
}

.buttons {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.btn {
  padding: 0.8rem 2rem;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.btn-login {
  background-color: #ff6b6b;
  color: #fff;
}

.btn-login:hover {
  background-color: #ff4c4c;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 8px 16px rgba(0,0,0,0.3);
}

.btn-register {
  background-color: #4ecdc4;
  color: #fff;
}

.btn-register:hover {
  background-color: #38bfb3;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 8px 16px rgba(0,0,0,0.3);
}

/* Responsive */
@media (max-width: 500px) {
  .buttons {
    flex-direction: column;
    gap: 0.8rem;
  }
  .btn {
    width: 100%;
    text-align: center;
  }
}
</style>
