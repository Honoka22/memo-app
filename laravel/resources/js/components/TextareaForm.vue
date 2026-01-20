<script setup lang="ts">
import { ref, computed } from 'vue';
import PlusSvg from './svgs/PlusSvg.vue';

const memoText = ref<string>('');
const isButtonEnabled = computed(() => memoText.value.trim().length > 0);
</script>


<template>
    <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100 max-w-lg">
        <div class="flex items-center gap-2 mb-4 font-bold text-gray-700">
            <span class="text-orange-400 text-xl">+</span>
            <span>新しいメモ</span>
        </div>

        <textarea
            v-model="memoText"
            placeholder="メモを入力してください...&#13;&#10;(Enterで保存、Shift+Enterで改行)"
            class="w-full h-32 p-4 border rounded-md resize-none focus:outline-none transition-colors"
            :class="isButtonEnabled ? 'border-pink-300' : 'border-gray-200 bg-gray-50'"
        ></textarea>

        <button
            :disabled="!isButtonEnabled"
            class="w-full mt-4 py-3 flex items-center justify-center gap-2 rounded-full text-white font-medium transition-all"
            :class="isButtonEnabled
        ? 'bg-gradient-to-r from-orange-300 to-pink-400 cursor-pointer shadow-md'
        : 'bg-gray-300 cursor-not-allowed'"
        >
            <PlusSvg class="w-4 h-4" />
            <span>メモを保存</span>
        </button>
    </div>
</template>

<style scoped>

</style>

<!--tailwindcssを使わないとこうなる
<template>
    <div class="memo-card">
        <div class="title">
            <span class="plus-icon">+</span> 新しいメモ
        </div>

    </div>
</template>

<style scoped>
.memo-card {
    border: 1px solid #eee;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    max-width: 400px;
}
.title {
    font-weight: bold;
    margin-bottom: 15px;
}
</style>
-->

<!--
<script setup>
import { ref } from 'vue'
const memoText = ref('') // 入力内容を保持
</script>

<template>
    <div class="memo-card">
    <textarea
        v-model="memoText"
        placeholder="メモを入力してください... (Enterで保存、Shift+Enterで改行)"
        :class="{ 'has-content': memoText.length > 0 }"
    ></textarea>
    </div>
</template>

<style scoped>
textarea {
    width: 100%;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
}
/* 1文字以上入力された時のボーダー色（任意課題） */
.has-content {
    border-color: #ff9a9e;
}
</style>
-->

<!--
<template>
  <button :disabled="memoText.length === 0" class="save-button">
    <span class="plus-icon">+</span> メモを保存
  </button>
</template>

<style scoped>
.save-button {
  width: 100%;
  margin-top: 15px;
  padding: 10px;
  background: linear-gradient(to right, #ffb396, #ff9a9e);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  opacity: 1;
}

/* 2-a: ボタンがdisabledの時のスタイル */
.save-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
-->




