<template>
    <div class="container">
        <hr>
        <ul>
            <TasksComponent
            v-for="tasks of tasks"
            v-bind:key="tasks.id"
            v-bind:id="tasks.id"
            v-bind:text="tasks.text"
            v-bind:performed="tasks.performed"
            v-on:done-task="doneTask"
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
        },
        doneTask(id, performed) {
            this.$emit('done-task', id, performed)
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
