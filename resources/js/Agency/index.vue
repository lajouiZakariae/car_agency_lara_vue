<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";

const loading = ref(true);
const error = ref(false);
const agency = ref(null);

const route = useRoute();

onMounted(async function getAgency() {
    const { data } = await axios.get(`/api/agencies/${route.params.id}`);
    console.log(data);
    loading.value = false;
    agency.value = data.agency;
});
</script>

<template>
    <div class="mt-4">
        <div v-if="loading" class="loading">loading...</div>
        <div v-if="error" class="alert alert-danger">Ooops!</div>
        <div v-if="agency">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ agency.name }}</h3>
                    <p>{{ agency.carCount }}</p>
                </div>
            </div>
            <div
                v-if="agency.cars && agency.cars.length"
                class="table-responsive"
            >
                <table class="table">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Year</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="car of agency.cars">
                            <td scope="row">{{ car.id }}</td>
                            <td>{{ car.make }}&nbsp;{{ car.model }}</td>
                            <td>{{ car.year }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
