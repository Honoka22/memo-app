<script setup lang="ts">
import DocumentSvg from './svgs/DocumentSvg.vue'
</script>

<template>
    <header class="header">
        <DocumentSvg />
        <h1>Header</h1>
    </header>
</template>

<style scoped>
.header {
    display: flex;
    align-items: center;
    gap: 8px;
}
</style>
