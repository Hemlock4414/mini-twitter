<script setup>
import { ref, onMounted } from 'vue'

import { storeToRefs } from "pinia";
import { useAuthStore, authClient } from "@/store/AuthStore";
import router from "@/router";

import TweetCard from '@/js/components/TweetCard.vue';
import TweetCard from '../components/TweetCard.vue';

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
        <p>FEED VON</p>
        <h1>Willkommen, {{ authUser.name }}</h1>
        <button @click="handleLogout">Logout</button>
    </div>

    <TweetCard
        <div v-for="post in posts" :key="post.id">
                <h3>{{ post.title }}</h3>
                <p>{{ post.content }}</p>
                <RouterLink :to="{name: 'post-edit', params:{id: post.id}}">Bearbeiten</RouterLink>
        </div>
    />

</template>