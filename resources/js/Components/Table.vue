<script setup>
import DataTable from "datatables.net-vue3";

defineProps({
    data: {
        type: Array,
    },
    columns: {
        type: Array,
    },
});
</script>

<template>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <DataTable :data="data" :columns="columns" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
@import "bootstrap";
@import "datatables.net-bs5";
</style>
