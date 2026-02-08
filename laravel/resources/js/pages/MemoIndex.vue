<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import DocumentSvg from "../components/svgs/DocumentSvg.vue";
import TrashSvg from "../components/svgs/TrashSvg.vue";

/*mockデータの定義
const memos = ref([
    { id: 1, title: 'aaaa', date: '2025/8/19 18:38:29' },
    { id: 2, title: 'Vue.jsの基本構文を復習する', date: '2024-07-30 10:30' },
    { id: 3, title: 'Laravelのルーティングについて調べる', date: '2024-07-30 09:15' },
    { id: 4, title: '明日のプレゼン資料を準備する', date: '2024-07-29 16:45' },
]);*/
const memos = ref([]);
// 任意課題用
const hoveredId = ref(null);

const fetchMemos = async () => {
    try {
        const response = await axios.get('/api/memos');
        memos.value = response.data; // APIから取得したデータを格納
    } catch (error) {
        console.error('メモの取得に失敗しました:', error);
    }
};

onMounted(() => {
    fetchMemos();
});

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
                <h3 class="text-lg text-gray-900 mb-2 font-medium">{{ memo.content }}</h3>
                <p class="text-sm text-gray-400 font-mono">{{ memo.created_at }}</p>

                <button
                    v-if="hoveredId === memo.id"
                    class="absolute top-4 right-4 p-2 text-gray-400 hover:text-red-500 transition-colors"
                >
                    <TrashSvg class="h-5 w-5" />
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
