<script setup>
import axios from "axios";
import { isInteger, isEmpty, find, values } from "lodash";
import { ref } from "vue";

const agencies = ref([]);
const getAgencies = async () => {
    const { data } = await axios.get("/api/agencies").catch((err) => {
        if (err) {
            console.log(err);
        }
    });
    agencies.value = data;
};
getAgencies();

const categories = ref([]);
const getCategories = async () => {
    const { data } = await axios.get("/api/categories").catch((err) => {
        if (err) {
            console.log(err);
        }
    });
    categories.value = data;
};
getCategories();

const carToAdd = ref({
    make: "",
    model: "",
    year: "",
    readyToSell: false,
    agency: "",
    category: "",
});

const errors = ref({});

const addCar = () => {
    if (values(carToAdd.value).includes("")) return (errors.value.empty = true);
    errors.value.empty = false;

    if (!isInteger(errors.value.year)) return (errors.value.wrongInfo = true);

    axios.post("/api/cars", carToAdd);
};
</script>

<template>
    <form @submit.prevent="addCar">
        <div class="form-group mb-2">
            <input
                type="text"
                class="form-control"
                placeholder="Make"
                v-model="carToAdd.make"
            />
        </div>
        <div class="form-group mb-2">
            <input
                type="text"
                class="form-control"
                placeholder="model"
                v-model="carToAdd.model"
            />
        </div>
        <div class="form-group mb-2">
            <input
                type="text"
                class="form-control"
                placeholder="year"
                v-model="carToAdd.year"
            />
        </div>
        <div class="form-group mb-2">
            <input type="checkbox" v-model="carToAdd.readyToSell" />&nbsp;Ready
            To Sell
        </div>
        <div class="form-group mb-2">
            <select v-model="carToAdd.agency" class="form-select">
                <option
                    v-for="agency of agencies"
                    :value="agency.id"
                    :selected="agency.id === 1"
                >
                    {{ agency.name }}
                </option>
            </select>
        </div>
        <div class="form-group mb-2">
            <select v-model="carToAdd.category" class="form-select">
                <option
                    v-for="category of categories"
                    :value="category.id"
                    :selected="category.id === 1"
                >
                    {{ category.name }}
                </option>
            </select>
        </div>
        <div v-if="!isEmpty(errors)" class="form-group mb-2">
            <div class="alert alert-danger">
                <p v-if="errors.empty">Make Sure All the Fields are Filled</p>
                <p v-if="errors.wrongInfo">
                    Make Sure the Provided Information is Correct
                </p>
            </div>
        </div>
        <button class="btn btn-dark" type="submit">Add</button>
    </form>
</template>
