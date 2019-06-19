import AppForm from '../app-components/Form/AppForm';

Vue.component('invoice-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                product_id:  '' ,
                invoice_id:  '' ,
                service_id:  '' ,
                quantity:  '' ,
                
            }
        }
    }

});