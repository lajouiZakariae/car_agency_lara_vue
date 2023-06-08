<template>
    <h1>Hello <span>World</span></h1>
</template>

<script>
export default {
    data() {
        return {
            message: "Hello World",
        };
    },
};
</script>

<style lang="scss">
h1 {
    color: red;
    span {
        color: blue;
    }
}
</style>
