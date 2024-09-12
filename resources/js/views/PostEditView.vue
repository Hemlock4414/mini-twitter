<script setup>

import { ref, onMounted } from 'vue';
import { authClient } from '@/store/AuthStore';

import { useRoute } from 'vue-router';

const route = useRoute()
const post_id = route.params.id

const title = ref("");
const content = ref("");

const post= ref([])

const alertMessage = ref("")

// Get Post
const getPosts = async (id ) => {
    const res = await authClient.get(`/api/posts/${id}`)
    post.value = res.data
    title.value = post.value.title
    content.value = post.value.content
}

onMounted(()=>{
  getPosts(post_id)
})

const handleEdit = async () => {
    try{
        const rest = await authClient.post("/api/posts", {
            title: title.value,
            content: content.value
        })

        if(rest.status == 201) alertMessage.value = "Dein Tweet wurde bearbeitet!"

    } catch(e) {
        alert("Etwas ist schiefgelaufen!");
        console.log(e);
    }
}

</script>


<template>

    <div class="container">

        <div class="text-wrapper">
            <h3>Tweet bearbeiten</h3> 
        </div>

        <div class="form-wrapper">
            <div v-if="alertMessage">{{ alertMessage }}</div>
            <form action="" method="POST" @submit.prevent="handleEdit">
                <div class="form-group">
                    <label for ="title">Titel</label><br>
                    <input type="text" id="title" name="title" v-model="title">
                </div>
                <div class="form-group">
                    <label for ="content">Text</label><br>
                    <textarea id="content" name="content" rows="5" v-model="content"></textarea>
                </div>
                <button type="submit">Tweet updaten</button>
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
}

.text-wrapper {
  width: 768px; /* Gleiche Breite wie der form-wrapper */
  text-align: left;
  margin-bottom: 20px; /* Abstand zum Formular */
}

h3 {
    font-size: 32px;
    font-weight: 700;
    line-height: 38.73px;
    color: #222222;
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