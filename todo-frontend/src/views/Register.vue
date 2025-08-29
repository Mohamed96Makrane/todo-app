<template>
  <div class="register-container">
    <button class="btn-back" @click="goBack">← Retour</button>
    <h2>Inscription</h2>
    <form @submit.prevent="submit" class="register-form" enctype="multipart/form-data">

      <label for="full_name">Nom complet</label>
      <input v-model="full_name" id="full_name" placeholder="Nom complet" required />

      <label for="email">Email</label>
      <input v-model="email" type="email" id="email" placeholder="Email" required />

      <label for="phone_number">Téléphone</label>
      <input v-model="phone_number" id="phone_number" placeholder="Téléphone" />

      <label for="address">Adresse</label>
      <input v-model="address" id="address" placeholder="Adresse" />

      <label for="password">Mot de passe</label>
      <input type="password" v-model="password" id="password" placeholder="Mot de passe" required />

      <label for="password_confirmation">Confirmer mot de passe</label>
      <input type="password" v-model="password_confirmation" id="password_confirmation" placeholder="Confirmer mot de passe" required />

      <label for="image">Photo de profil</label>
      <input type="file" id="image" @change="onFileChange" />

      <button type="submit">S’inscrire</button>
    </form>
  </div>
</template>

<script>
import { useUserStore } from '../stores/user'

export default {
  data() {
    return {
      full_name: '',
      email: '',
      phone_number: '',
      address: '',
      password: '',
      password_confirmation: '',
      image: null
    }
  },
  setup() {
    const userStore = useUserStore()
    return { userStore }
  },
  methods: {
    goBack() {
      window.history.back()
    },
    onFileChange(e) {
      this.image = e.target.files[0]
    },
    async submit() {
      const formData = new FormData()
      formData.append('full_name', this.full_name)
      formData.append('email', this.email)
      formData.append('phone_number', this.phone_number)
      formData.append('address', this.address)
      formData.append('password', this.password)
      formData.append('password_confirmation', this.password_confirmation)
      if (this.image) formData.append('image', this.image)

      try {
        await this.userStore.register(formData)
        alert('Inscription réussie !')
        this.$router.push('/login')
      } catch (error) {
        alert(error.response?.data?.message || 'Erreur lors de l’inscription')
      }
    }
  }
}
</script>

<style scoped>
.register-container {
  max-width: 450px;
  margin: 4rem auto;
  padding: 2.5rem;
  border-radius: 12px;
  background-color: #ffffff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  position: relative;
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
  transition: background 0.3s;
}

.btn-back:hover {
  background-color: #5a6268;
}

.register-container h2 {
  text-align: center;
  margin-bottom: 2rem;
  color: #222;
}

.register-form {
  display: flex;
  flex-direction: column;
}

.register-form label {
  margin-bottom: 0.4rem;
  font-weight: 600;
  color: #333;
}

.register-form input {
  padding: 0.65rem;
  margin-bottom: 1.2rem;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.register-form input:focus {
  border-color: #28a745;
  outline: none;
}

.register-form button {
  padding: 0.8rem;
  background-color: #28a745;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s, transform 0.2s;
}

.register-form button:hover {
  background-color: #218838;
  transform: translateY(-2px);
}
</style>
