<script setup>
import { ref, onMounted } from 'vue'

import { storeToRefs } from "pinia";
import { useAuthStore, authClient } from "@/store/AuthStore";
import router from "@/router";

import TweetCard from '../components/TweetCard.vue';

// Pinia Store (authUser und logout aus dem Store)
const { authUser } = storeToRefs(useAuthStore());
const { logout } = useAuthStore();

// Handle Logout
const handleLogout = () => {
    logout();
    router.push("/login");
};

// Funktion, um das Datum in DD.MM.YYYY zu formatieren
const formatDate = (dateString) => {
  const date = new Date(dateString);
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Monate sind 0-basiert, daher +1
  const day = String(date.getDate()).padStart(2, '0'); // Tag holen und formatieren
  return `${day}.${month}.${year}`; // Format TT.MM.JJJJ
};

// Get Posts
const posts = ref([])

const getPosts = async () => {
    const response = await authClient.get("/api/posts")
    // const fetchedPosts = response.data;

/*  const response = await fetch("/api/posts") // mit Fetch als Alternative
    const data = res.data */

    posts.value = response.data

    // Datum für jeden Post formatieren
    posts.value = fetchedPosts.map(post => ({
    ...post,
    created_at: formatDate(post.created_at) // Datum formatieren
    }));

    console.log(response);
}
onMounted( async() => {
    getPosts()
})


</script>

<template>

    <div class="container">
        <div class="text-wrapper"> 
            <div>
                <p>FEED VON</p>
                <h3>{{ authUser.name }}</h3> 
            </div>    
            <button class="button" @click="handleLogout">Logout</button>
        </div>

        <TweetCard
            v-for="post in posts" :key="post.id"
                :date="post.created_at"
                :title="post.title"
                :text="post.content"
        >        
                <RouterLink :to="{name: 'post-view', params:{id: post.id}}">
                    <button class="button">Tweet ansehen</button>
                </RouterLink> 
        </TweetCard>

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
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  margin-bottom: 37px;
}

h3 {
  font-size: 32px;
  font-weight: 700;
  line-height: 38.73px;
  margin-bottom: 4px;
  color: #222222;
}

p {
  font-size: 16px;
  font-weight: 700;
  line-height: 19.36px;
  color: #888888;
}

button {
    width: fit-content;
    height: fit-content;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 900;
    border-radius: 8px;
    background-color: #222222;
    color: #FFFFFF;
    text-align: center;
    cursor: pointer;
}

button:hover {
    background-color: #888888;
}

</style>