<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
const loading = ref(true);
const error = ref(false);
const cars = ref(null);

const getCars = async () => {
    const { data } = await axios.get("/api/cars/overview").catch((err) => {
        if (err) {
            loading.value = false;
            error.value = true;
        }
    });
    loading.value = false;
    cars.value = data;
};
getCars();

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

const addCar = () => {
    console.log(carToAdd);
};
</script>
<template>
    <div class="row mt-4">
        <div class="col-4">
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
                    <input
                        type="checkbox"
                        v-model="carToAdd.readyToSell"
                    />&nbsp;Ready To Sell
                </div>
                <div class="form-group mb-2">
                    <select v-model="carToAdd.agency" class="form-select">
                        <option v-for="agency of agencies" :value="agency.id">
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
                <button class="btn btn-dark" type="submit">Add</button>
            </form>
        </div>
        <div class="col-8">
            <div v-if="loading" class="loading">loading...</div>

            <div v-if="error" class="error">
                Whoops! Something is wrong. Try later.
            </div>
            <table class="w-100">
                <thead>
                    <th>#</th>
                    <th>Year</th>
                </thead>
                <tbody>
                    <tr
                        v-if="cars && cars.length"
                        v-for="car of cars"
                        class="col-6"
                    >
                        <td>{{ car.make }} {{ car.model }}</td>
                        <td>{{ car.year }}</td>
                    </tr>
                    <tr v-else>
                        <td colspan="3" class="text-center">
                            No Cars in the listing
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style lang="scss"></style>
