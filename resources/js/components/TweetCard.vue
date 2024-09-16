<script setup>
</script>

<template>

    <div class="container">

        <div class="date">{{  }}</div>
        <div class="title">{{  }}</div>
        <div class="text">{{  }}</div>
        <button class="btn">Tweet ansehen</button>

    </div>

</template>

<style scoped>

.container {
    max-width: 768px;
    min-height: 199px;
    background-color: #FFFFFF;
    border-radius: 8px;
    border: solid 1px #F1F1F1;
    display: flex;
    flex-direction: column;
}

.date {
    font-size: 14px;
    font-weight: 400;
    line-height: 16.94px;
    color: #888888;
}

.title {
    font-size: 18px;
    font-weight: 700;
    line-height: 21.78px;
    color: #222222;
}

.text {
    font-size: 18px;
    font-weight: 400;
    line-height: 21.78px;
    color: #444444;
}

.btn {
    background-color: #222222;
    border-radius: 8px;
    padding: 10px 15px;
    color: #FFFFFF;
    font-size: 14px;
    line-height: 18px;
    font-weight: 400;
}

</style>