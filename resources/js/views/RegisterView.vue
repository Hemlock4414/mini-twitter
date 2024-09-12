<script setup>

import { ref } from "vue";
import { useAuthStore } from "@/store/AuthStore";
import router from "@/router";

const { register, getAuthUser } = useAuthStore(); 

const name = ref("");
const email = ref("");
const password = ref("");
const password_confirmation = ref("");

const handleRegister = async () => {
    const respReg = await register(
        {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value
        }
    )
    if (respReg.status !== 201) {
        return alert("something went wrong")
    }  

    const resUser = await getAuthUser();

    if (resUser.status === 200) router.push("/dashboard");
}
</script>

<template>

    <div class="container">

        <h3>Live and Trending</h3>
        <p>Join now!</p>

        <div class="form-wrapper">
            <form action="" method="POST" @submit.prevent="handleRegister">
                <div class="form-group">
                    <label for ="name">Name *</label><br>
                    <input type="text" id="name" name="name" v-model="name">
                </div>
                <div class="form-group">
                    <label for ="email">E-Mail *</label><br>
                    <input type="text" id="email" name="email" v-model="email">
                </div>
                <div class="form-group">
                    <label for ="password">Passwort *</label><br>
                    <input type="password" id="password" name="password" v-model="password">
                </div>
                <div class="form-group">
                    <label for ="password_confirmation">Passwort Bestätigen *</label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation" v-model="password_confirmation">
                </div>
                <button type="submit">Register</button>
            </form>
        </div>    
    </div>

</template>

<style scoped>
/* Zentriere den gesamten Inhalt auf dem Bildschirm */
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: start; /* Links ausgerichtet für h3 und p */
}

h3 {
    font-size: 32px;
    font-weight: 700;
    line-height: 38.73px;
    margin-bottom: 4px;
    color: #222222;
}

p {
    font-size: 24px;
    font-weight: 400;
    line-height: 29.05px;
    margin-bottom: 31px;
    color: #666666;
}

/* Der Rahmen um das Formular */
.form-wrapper {
  background-color: #FFFFFF;
  max-width: 768px;
  max-height: 444px;
  border-radius: 4px;
  border: solid 1px #F1F1F1;
  padding: 40px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Leichter Schatten */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

/* Gestalte die Formularelemente */
.form-group label {
  margin-bottom: 4px;
  font-weight: 400;
  font-size: 24px;
  color: #444444;
  line-height: 29.05px;
}

input[type="text"], textarea {
  width: 680px;
  padding: 10px;
  border: 1px solid #999999;
  border-radius: 4px;
  font-size: 16px;
}

button {
  width: 140px;
  padding: 10px 15px;
  background-color: #1D9BF0;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 400;
  line-height: 18px;
  cursor: pointer;
  text-align: center;
  gap: 10px;
}

button:hover {
  background-color: #0056b3;
}
</style>