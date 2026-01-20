<template>
    <Header />
    <router-view />
    <TextareaForm />
</template>

<script setup>
import Header from './components/Header.vue'
import TextareaForm from './components/TextareaForm.vue'
</script>
