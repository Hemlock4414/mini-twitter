<script setup>
import { RouterLink, RouterView } from "vue-router";
import { useAuthStore } from "./store/AuthStore";
import { storeToRefs } from "pinia";
const { authUser } = storeToRefs(useAuthStore());
</script>

<template>
    <header>
        <a href="http://localhost" class="link-div">
            <div class="headline">MINI-TWITTER</div>
        </a>    
        <div>
            <nav class="navi">
                <!-- <RouterLink to="/">Home</RouterLink> -->
                <RouterLink to="/dashboard" v-if="authUser">Meine Tweets</RouterLink>
                <RouterLink to="/login" v-if="authUser == null">Login</RouterLink>
                <RouterLink to="/register" v-if="!authUser">Register</RouterLink>
                <!-- <RouterLink to="/edit" v-if="authUser">Tweet bearbeiten</RouterLink> -->
                <!-- <RouterLink to="/post/create" v-if="authUser">Tweet erstellen</RouterLink> -->
                <RouterLink :to="{name: 'post-create'}" v-if="authUser" class="special-link">+ Tweet erstellen</RouterLink>
                <!-- <RouterLink :to="{name: 'post-view'}" v-if="authUser">Tweet ansehen</RouterLink> -->
            </nav>
        </div>
    </header>
    <RouterView />

    <main></main>

    <footer>
        <div class="footer-left">Mini-Twitter built with Laravel</div>

        <div class="footer-right">@ Antonio Marrara</div>
    </footer>

</template>

<style scoped>

header {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    background-color: #FFFFFF;
    min-height: 104px;
    border-bottom: solid 1px #F1F1F1;
    color: #222222;
    margin-bottom: 108px;
}

.headline { 
    font-size: 24px;
    font-weight: 900;
    line-height: 29.05px;
    letter-spacing: -0.02em;  /* Letter -2% */
}

.link-div {
  text-decoration: none;
  color: inherit;
}

.navi a {
  margin-left: 20px; 
  text-decoration: none;
  color: #222222;
  font-size: 18px;
  font-weight: 400;
  line-height: 21.78px;
}

.special-link {
    background-color: #1D9BF0;
    padding: 10px 15px;
    border-radius: 50px;
    width: fit-content;
    color: #FFFFFF !important;
    font-size: 16px !important;
    line-height: 19.36px !important;
}

.special-link:hover {
    background-color: #0056b3;;
}

footer {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    background-color: #FFFFFF;
    min-height: 48px;
    font-size: 20px;
    color: #222222;
    font-weight: 400;
    line-height: 24.2px;
}

.footer-left {
    margin-left: 30px;
}

.footer-right {
    margin-right: 30px;
}
</style>