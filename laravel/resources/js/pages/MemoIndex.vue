<script setup lang="ts">
import { ref } from 'vue';
import DocumentSvg from "../components/svgs/DocumentSvg.vue";

// mockデータの定義
const memos = ref([
    { id: 1, title: 'aaaa', date: '2025/8/19 18:38:29' },
    { id: 2, title: 'Vue.jsの基本構文を復習する', date: '2024-07-30 10:30' },
    { id: 3, title: 'Laravelのルーティングについて調べる', date: '2024-07-30 09:15' },
    { id: 4, title: '明日のプレゼン資料を準備する', date: '2024-07-29 16:45' },
]);

// 任意課題用
const hoveredId = ref(null);
</script>

<template>
    <div class="max-w-2xl mx-auto p-6 bg-[#fff9f5] min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <DocumentSvg class="w-6 h-6 text-orange-500" />
                <h2 class="text-xl font-bold text-gray-800">保存されたメモ</h2>
            </div>
            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-medium">
                {{ memos.length }}件
            </span>
        </div>

        <div class="space-y-4">
            <div
                v-for="memo in memos"
                :key="memo.id"
                @mouseenter="hoveredId = memo.id"
                @mouseleave="hoveredId = null"
                class="relative bg-white p-5 rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md cursor-pointer"
            >
                <h3 class="text-lg text-gray-900 mb-2 font-medium">{{ memo.title }}</h3>
                <p class="text-sm text-gray-400 font-mono">{{ memo.date }}</p>

                <button
                    v-if="hoveredId === memo.id"
                    class="absolute top-4 right-4 p-2 text-gray-400 hover:text-red-500 transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
