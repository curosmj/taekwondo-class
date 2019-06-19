import AppForm from '../app-components/Form/AppForm';

Vue.component('inventory-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.products = ((await axios.get('/admin/products')).data.data.data)
    },
    data: function() {
        return {
            products: [],
            form: {
                product_id:  '' ,
                inventory_quantity:  '' ,
                
            }
        }
    }

});