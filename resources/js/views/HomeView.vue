 <script setup>

import { ref, onMounted } from 'vue'
import { authClient } from '@/store/AuthStore';

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
        <h1>Home View</h1>
        <div v-for="post in posts" :key="post.id">
            <h3>{{ post.title }}</h3>
            <p>{{ post.content }}</p>
        </div>
    </div>
</template>