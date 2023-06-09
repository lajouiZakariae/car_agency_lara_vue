<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const loading = ref(true);
const error = ref(false);
const agencies = ref(null);

onMounted(async () => {
    const { data } = await axios
        .get("/api/agencies/overview")
        .catch((err) => err && (error.value = true));
    console.log(data);
    loading.value = false;
    agencies.value = data;
});
</script>

<template>
    <h2>Agencies</h2>
    <div v-if="loading" class="loading">loading...</div>
    <div v-if="error" class="alert alert-danger">ooops! Something Wrong</div>
    <div v-if="agencies && agencies.length" class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cars</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="agency of agencies" class="">
                    <td scope="row">{{ agency.id }}</td>
                    <td>{{ agency.name }}</td>
                    <td>
                        <router-link :to="`/agencies/${agency.id}`">
                            {{ agency.car_count }}
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
