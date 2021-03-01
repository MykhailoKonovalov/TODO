<template>
<li>
    <div class="row" v-bind:class="{done: performed}">
        <div class="col-2">
            <input type="checkbox"
                   v-on:click="$emit('done-task', id, performed)"
                   v-model="checked">
        </div>
        <div class="col-8">
            <p>{{ text }}</p>
        </div>
        <div class="col-2">
            <button class="btn-danger delete"
                    v-on:click="$emit('delete-task', id)">
                &times;
            </button>
        </div>
    </div>
</li>
</template>

<script>
export default {
    name: "Tasks",
    data() {
        return {
            checked: this.performed
        }
    },
    props: {
        id: {
            type: Number,
            required:true
        },
        text: {
            type: String,
            required: true
        },
        performed: {
            type: Number,
            required:true
        }
    },
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
