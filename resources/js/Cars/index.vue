<script setup>
import AddCar from "../AddCar/index.vue";
import useFetchCars from "../Cars/useFetchCars";

const { loading, error, cars } = useFetchCars();
</script>
<template>
    <div class="row mt-4">
        <div class="col-4">
            <AddCar />
        </div>
        <div class="col-8">
            <div v-if="loading" class="loading">loading...</div>

            <div v-if="error" class="alert alert-danger">
                Whoops! Something is wrong. Try later.
            </div>
            <div class="table-responsive" v-if="cars">
                <table v-if="cars.length" class="table w-100">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <!-- <th>Year</th> -->
                    </thead>

                    <tbody>
                        <tr v-for="car of cars" class="col-6">
                            <td>{{ car.id }}</td>
                            <td>{{ car.make }} {{ car.model }}</td>
                            <!-- <td>{{ car.year }}</td> -->
                        </tr>
                    </tbody>
                </table>
                <div v-else class="alert alert-info">
                    <td colspan="3" class="text-center">
                        No Cars in the listing
                    </td>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss"></style>
