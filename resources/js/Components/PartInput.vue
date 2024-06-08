<script setup>
defineProps({
    part: {
        type: Object,
    },
    deletePart: {
        type: Function,
        required: true,
    },
    errors: {
        type: Object,
    },
});
</script>

<template>
    <div class="p-3 border-2 border-dark border-opacity-10 border rounded-1">
        <div class="form-group py-2">
            <label for="name">Part Name</label>
            <input
                type="text"
                v-model="part.name"
                class="form-control"
                placeholder="Name"
            />
            <p class="text-danger" v-if="errors.name">
                {{ errors?.name?.[0] }}
            </p>
        </div>
        <div class="form-group py-2">
            <label for="serial_number">Serial Number</label>
            <input
                type="text"
                v-model="part.serial_number"
                class="form-control"
                placeholder="Serial Number"
            />
            <p class="text-danger" v-if="errors?.serial_number">
                {{ errors?.serial_number?.[0] }}
            </p>
        </div>
        <button type="button" class="btn btn-danger mt-2" @click="deletePart">
            Delete Part
        </button>
    </div>
</template>

<style>
@import "bootstrap";
</style>
