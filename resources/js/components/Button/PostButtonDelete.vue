<script setup>

import {defineProps} from 'vue';

import { authClient } from '@/store/AuthStore';

import router from "@/router";

const props = defineProps ({
    post_id: null
})

const postDelete = async (id) => {
    try {
        const res = await authClient.delete(`/api/posts/${id}`)

        if (res.status == 204) router.push({name: "dashboard"})

    } catch (e) {
        console.log(e);
    }
}
</script>

<template>

    <button @click="postDelete(props.post_id)" class="del-btn">Tweet löschen</button>

</template>

<style scoped>

.del-btn {
  background-color: #DF1313;
  font-size: 14px;
  font-weight: 400;
  line-height: 18px;
  color: #FFFFFF;
  width: fit-content;
}

.del-btn:hover {
  background-color: #8c0505;
}

</style>