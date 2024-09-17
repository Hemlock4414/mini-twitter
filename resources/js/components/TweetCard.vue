<script setup>

const props = defineProps({
  date: String,
  title: String,
  text: String
});

// Funktion, um das Datum in TT.MM.JJJJ zu formatieren
const formatDate = (dateString) => {
  const date = new Date(dateString);
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Monate sind 0-basiert, daher +1
  const day = String(date.getDate()).padStart(2, '0'); // Tag holen und formatieren
  return `${day}.${month}.${year}`; // Format TT.MM.JJJJ
};

</script>

<template>

    <div class="form-wrapper">

        <div class="form-group">
            <div class="date">{{ formatDate(props.date) }}</div>
            <div class="title">{{ props.title }}</div>
            <div class="text">{{ props.text }}</div>
            <slot></slot>
        </div>    
    </div>

</template>

<style scoped>

.form-wrapper  {
    width: 768px;
    height: fit-content;
    background-color: #FFFFFF;
    border-radius: 8px;
    border: solid 1px #F1F1F1;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Leichter Schatten */
    margin-bottom: 8px;
}

.form-group {
  padding: 17px 21px 27px 37px;  
  min-height: 100px;
}

.date {
    font-size: 14px;
    font-weight: 400;
    line-height: 16.94px;
    color: #888888;
    display: flex;
    justify-content: end;
}

.title {
    font-size: 18px;
    font-weight: 700;
    line-height: 21.78px;
    color: #222222;
    margin-bottom: 10px;
}

.text {
    font-size: 18px;
    font-weight: 400;
    line-height: 21.78px;
    color: #444444;
    margin-bottom: 24px;
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