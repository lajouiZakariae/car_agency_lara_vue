<script>
import Navbar from "./Navbar.vue";

export default {
    components: {
        Navbar,
    },
    data() {
        return {};
    },
};
</script>
<template>
    <Navbar />
    <div class="container">
        <router-view />
    </div>
</template>
