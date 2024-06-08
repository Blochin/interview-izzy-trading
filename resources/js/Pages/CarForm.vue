<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    layout: AppLayout,
};
</script>

<script setup>
import PartInput from "../Components/PartInput.vue";
import { router } from "@inertiajs/vue3";

let props = defineProps({
    car: {
        type: Object,
    },
    errorMessage: {},
});

const submitForm = async (car) => {
    const formData = {
        name: car.name,
        registration_number: car.registration_number,
        is_registered: car.is_registered,
        parts: car.parts,
    };

    const method = !car?.id ? "post" : "put";
    const url = !car?.id ? "/cars" : `/cars/${car.id}`;

    axios[method](url, formData)
        .then(() => {
            router.visit("/cars");
        })
        .catch((error) => {
            props.errorMessage = error.response.data.errors;
        });
};

const addNewPart = () => {
    props.car.parts.push({
        name: "",
        serial_number: "",
    });
};

const deletePart = (index) => {
    props.car.parts.splice(index, 1);
};
</script>

<template>
    <div class="bg-white rounded-2 p-3">
        <form @submit.prevent="submitForm(car)">
            <div class="form-group pt-2">
                <label for="name">Car Name</label>
                <input
                    type="text"
                    id="name"
                    v-model="car.name"
                    class="form-control"
                    placeholder="Name"
                />
                <div v-if="errorMessage?.name">
                    <p
                        class="text-danger"
                        v-for="(message, index) in errorMessage.name"
                        :key="index"
                    >
                        {{ message }}
                    </p>
                </div>
            </div>
            <div class="form-group pt-2">
                <label for="registration_number">Registration Number</label>
                <input
                    type="text"
                    id="registration_number"
                    v-model="car.registration_number"
                    class="form-control"
                    placeholder="Registration Number"
                />
                <div v-if="errorMessage?.registration_number">
                    <p
                        class="text-danger"
                        v-for="(
                            message, index
                        ) in errorMessage.registration_number"
                        :key="index"
                    >
                        {{ message }}
                    </p>
                </div>
            </div>
            <div class="form-check py-2">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="is_registered"
                    v-model="car.is_registered"
                    :checked="car.is_registered"
                />
                <label class="form-check-label" for="is_registered"
                    >Is Registered</label
                >
            </div>
            <div v-for="(part, index) in car.parts" :key="index">
                <div class="mb-2">
                    <part-input
                        :part="part"
                        :deletePart="() => deletePart(index)"
                        :errors="{
                            name: props.errorMessage?.[`parts.${index}.name`],
                            serial_number:
                                props.errorMessage?.[
                                    `parts.${index}.serial_number`
                                ],
                        }"
                    ></part-input>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-light" @click="addNewPart">
                    Add Part
                </button>
            </div>
        </form>
    </div>
</template>

<style>
@import "bootstrap";
</style>
