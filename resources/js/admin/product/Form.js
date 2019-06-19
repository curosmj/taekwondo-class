import AppForm from '../app-components/Form/AppForm';

Vue.component('product-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                description:  '' ,
                cost_price:  '' ,
                selling_price:  '' ,
                
            }
        }
    }

});