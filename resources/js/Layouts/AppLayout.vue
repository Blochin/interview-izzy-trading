<script setup>
import Navbar from "../Components/Navbar.vue";
</script>

<template>
    <div class="bg-dark-subtle min-vh-100 pb-2">
        <Navbar />
        <div class="container mt-3">
            <slot></slot>
        </div>
    </div>
</template>

<style>
@import "bootstrap";
</style>
