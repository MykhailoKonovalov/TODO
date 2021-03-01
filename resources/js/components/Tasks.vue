<template>
<li>
    <div class="row" v-bind:class="{done: tasks.performed}">
        <div class="col-2">
            <input type="checkbox" v-on:change="tasks.performed = !tasks.performed">
        </div>
        <div class="col-8">
            <p>{{ tasks.text }}</p>
        </div>
        <div class="col-2">
            <button class="btn-danger delete" v-on:click="$emit('delete-task', tasks.id)">
                &times;
            </button>
        </div>
    </div>
</li>
</template>

<script>
export default {
    name: "Tasks",
    props: {
        tasks: {
            type: Object,
            required:true
        }
    }
}
</script>

<style scoped>
li {
    justify-content: space-between;
}
.done {
    text-decoration: line-through;
}
</style>
