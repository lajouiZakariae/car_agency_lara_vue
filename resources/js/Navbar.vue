<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            ></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li v-for="(link, index) in links" class="nav-item">
                        <router-link class="nav-link" :to="link.url">
                            {{ link.text }}
                        </router-link>
                        <!-- <span
                            class="visually-hidden"
                        ></span> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    props: ["activePage"],
    data() {
        return {
            links: [
                { text: "Home", url: "/" },
                { text: "Agencies", url: "/agencies" },
                // { text: "Cars", url: "/cars" },
                // { text: "", url: "/" },
            ],
        };
    },
    methods: {},
};
</script>
