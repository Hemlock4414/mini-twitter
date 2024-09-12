<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
    <header>
        <div>
            <nav>
                <RouterLink to="/">Home</RouterLink>
                <RouterLink to="/dashboard">Dashboard</RouterLink>
                <RouterLink to="/login">Login</RouterLink>
                <RouterLink to="/register">Register</RouterLink>
                <RouterLink to="/edittweet">Edit Tweet</RouterLink>
                <RouterLink to="/createtweet">Create Tweet</RouterLink>
                <RouterLink to="/singletweet">View Tweet</RouterLink>
            </nav>
        </div>
    </header>
    <RouterView />

    <main></main>

    <footer>
        <div >Mini-Twitter built with Laravel</div>

        <div>@ Antonio Marrara</div>
    </footer>

</template>