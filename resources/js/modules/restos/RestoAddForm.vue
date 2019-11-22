<template>
    <div class="resto_add_from_wrapper">
        <h3>Add a new Restaurant</h3>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
            class="form-control"
            name="name"
            placeholder="Enter restaurant name">
        </div>

        <div class="form-group">
            <label for="name">Address</label>
            <input type="text"
            class="form-control"
            name="address"
            placeholder="Enter restaurant address">
        </div>

        <div class="form-group">
            <label for="name">Number of table</label>
            <input type="text"
            class="form-control"
            name="tables"
            placeholder="Enter restaurant table">
        </div>

        <button class="btn btn-primary">Add</button>
        <button class="btn btn-warning" @click="handleCancelButton">Cancel</button>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods: {
      handleCancelButton(){

          this.$emit('modalCancel');
      }  
    },
}
</script>    