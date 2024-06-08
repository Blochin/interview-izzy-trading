<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    layout: AppLayout,
};
</script>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";
import Table from "../Components/Table.vue";

const props = defineProps({
    parts: {
        type: Array,
        required: true,
    },
});

const parts = ref([...props.parts]);

const editItem = (id) => {
    router.visit("/cars/" + id);
};

const deleteItem = (id) => {
    axios
        .delete(`/parts/${id}`)
        .then(() => {
            parts.value = parts.value.filter((part) => part.id !== id);
        })
        .catch((error) => {
            console.error(error);
        });
};

const columns = [
    { data: "id", title: "ID" },
    { data: "name", title: "Name" },
    { data: "serial_number", title: "Serial Number" },
    {
        data: null,
        title: "Actions",
        orderable: false,
        render() {
            return `
            <div class="d-flex">
                <button class="btn btn-primary btn-sm edit-btn me-1">Edit</button>
                <button class="btn btn-danger btn-sm delete-btn">Delete</button>
            </div>`;
        },
        createdCell(cell, cellData, rowData) {
            cell.querySelector(".edit-btn").addEventListener("click", () =>
                editItem(rowData.car_id),
            );
            cell.querySelector(".delete-btn").addEventListener("click", () =>
                deleteItem(rowData.id),
            );
        },
    },
];
</script>

<template>
    <Table :columns="columns" :data="parts" />
</template>

<style></style>
