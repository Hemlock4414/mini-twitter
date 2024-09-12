<script setup>
import { ref, onMounted } from 'vue'

import { storeToRefs } from "pinia";
import { useAuthStore, authClient } from "@/store/AuthStore";
import router from "@/router";
const { authUser } = storeToRefs(useAuthStore());
const { logout } = useAuthStore();

//
const handleLogout = () => {
    logout();
    router.push("/login");
};

// Get Posts
const posts = ref([])

const getPosts = async () => {
    const response = await authClient.get("/api/posts")

/*     const response = await fetch("/api/posts") // mit Fetch als Alternative
    const data = res.data */

    posts.value = response.data

    console.log(response);
}
onMounted( async() => {
    getPosts()
})
</script>

<template>
    <div>
        <h1>Dashboard View</h1>
        <p>Welcome, {{ authUser.name }}</p>
        <button @click="handleLogout">Logout</button>
    </div>

    <div v-for="post in posts" :key="post.id">
            <h3>{{ post.title }}</h3>
            <p>{{ post.content }}</p>
            <RouterLink :to="{name: 'post-edit', params:{id: post.id}}">Bearbeiten</RouterLink>
    </div>

</template>