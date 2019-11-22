<template>
    <div>
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food item</label>
                <input class="form-control" type="text" placeholder="Enter Food item name" v-model="food.item">
                <div class="validation-message" v-text="validation.getMessage('item')"></div>
            </div>

            <div class="form-group">
                <label for="name">Select category</label>
                <multiselect v-model="food.category" :options="categories"></multiselect>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" type="number" v-model="food.price">
                <div class="validation-message" v-text="validation.getMessage('price')"></div>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <textarea class="form-control" v-model="food.description" placeholder="Enter item description"></textarea>
                <div class="validation-message" v-text="validation.getMessage('description')"></div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../libs/Validation.js'
export default {
    props:['categories','restoId'],
    components:{
        Multiselect,
    },
    data(){
        return{
            food:this.clearFields(),
            validation: new Validation()
        }
    },
    methods: {
        handleSubmit(){
            // console.log('submit',this.food);
            let postData = this.food;
            postData.restoId = this.restoId;
            axios.post('store/menu',postData).then(response => {
                this.$emit('newItemAdded', response.data, postData.category);
                this.food = this.clearFields();
               
            }).catch(error =>{
               // console.log('error',error.response)
                if(error.response.status == 422){
                    this.validation.setMessages(error.response.data.errors)
                }
            })
        },
        clearFields(){
            return {
                item: '',
                category:'',
                price: 100,
                description: ''
            }
        }
    },
}
</script>