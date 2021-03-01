<template>
    <div class="container wrapper">
        <div class="row justify-content-center">
            <div class="card">
                <h1>TODO</h1>
            </div>
        </div>
        <hr>
        <div class="container">
        <router-view />
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
}
</script>

<style scoped>
.wrapper {
    background: white;
}
</style>
