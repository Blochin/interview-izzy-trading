<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    layout: AppLayout,
};
</script>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";
import Table from "../Components/Table.vue";

const props = defineProps({
    cars: {
        type: Array,
        required: true,
    },
});

const cars = ref([...props.cars]);

const editItem = (id) => {
    router.visit("/cars/" + id);
};

const deleteItem = (id) => {
    axios
        .delete(`/cars/${id}`)
        .then(() => {
            cars.value = cars.value.filter((car) => car.id !== id);
        })
        .catch((error) => {
            console.error(error);
        });
};

const columns = [
    { data: "id", title: "ID" },
    { data: "name", title: "Name" },
    { data: "registration_number", title: "Registration Number" },
    { data: "is_registered", title: "Is Registered" },
    {
        data: null,
        title: "Actions",
        orderable: false,
        render() {
            return `
            <div class="d-flex">
                <button class="btn btn-primary btn-sm edit-btn me-1">Edit</button>
                <button class="btn btn-danger btn-sm delete-btn">Delete</button>
            </div>
            `;
        },
        createdCell(cell, cellData, rowData) {
            cell.querySelector(".edit-btn").addEventListener("click", () =>
                editItem(rowData.id),
            );
            cell.querySelector(".delete-btn").addEventListener("click", () =>
                deleteItem(rowData.id),
            );
        },
    },
];
</script>

<template>
    <Table :columns="columns" :data="cars" />
</template>

<style></style>
