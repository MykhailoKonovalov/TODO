<template>
    <div class="container">
        <hr>
        <ul>
            <TasksComponent
            v-for="tasks of tasks"
            v-bind:tasks="tasks"
            v-on:delete-task="deleteTask"
            ></TasksComponent>
        </ul>
    </div>
</template>

<script>
import TasksComponent from "./Tasks";
export default {
    name: 'Todo',
    props: ['tasks'],
    components: {
        TasksComponent
    },
    methods: {
        deleteTask(id) {
            this.$emit('delete-task', id)
        }
    }
}
</script>

<style scoped>

ul {
    list-style: none;
    margin: 0;
    padding: 0 20% 0 20%;
}
</style>
