<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link href="/cars" method="get" class="nav-link"
                            >All Cars</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link href="/parts" method="get" class="nav-link"
                            >All Parts</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link href="/cars/new" method="get" class="nav-link"
                            >Add Car</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style>
@import "bootstrap";
</style>
