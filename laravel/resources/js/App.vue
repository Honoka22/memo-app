<template>
    <Header />
    <router-view />
    <TextareaForm />
    <MemoIndex />
</template>

<script setup>
import Header from './components/Header.vue'
import TextareaForm from './components/TextareaForm.vue'
import MemoIndex from './pages/MemoIndex.vue'
</script>
