<template>
    <div class="wrapper menu__container">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect v-model="menu" :options="categories"></multiselect>
                        </div>
                        <menu-group :items="currentMenuItem"></menu-group>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add menu item</template>
                    <template slot="body">
                        <menu-add-form :categories="categories" 
                            :resto-id="restoId"
                            v-on:newItemAdded="handleMenuItem"
                        ></menu-add-form>
                    </template>
                </card-component>

            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import Multiselect from 'vue-multiselect';
    import MenuGroup from './MenuGroups.vue';
    import MenuAddForm from './MenuAddForm.vue';

export default {
    props: ['items','restoId'],
    components:{
        Multiselect,
        MenuGroup,
        MenuAddForm
    },
    data(){
        return{
            localItems: '',
            menu: '',
            categories: [],
        }
    },
     created() {
        _.forEach(this.items, (item, key) => {
        this.categories.push(key);
        });
        this.menu = this.categories[0];
        this.localItems = this.items;

    },
    computed:{
        currentMenuItem(){
            return this.localItems[this.menu]; 
            // console.log('keu');
        }
    },
    methods: {
        fetchCategories() {
            axios.get('categories').then(response => {
                this.categories = response.data
                // console.log(categories)
            });
        },
        // addNewItem(item, category) {
        //     this.localItems[category].unshift(item);
        // },
        handleMenuItem(item,category){
            // console.log('item',item);
            this.localItems[category].unshift(item)
        }
    },
}
</script>

<style scoped>

</style>