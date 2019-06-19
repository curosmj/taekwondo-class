import AppForm from '../app-components/Form/AppForm';

Vue.component('service-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                service_name:  '' ,
                service_description:  '' ,
                service_selling_price:  '' ,
                service_num_days:  '' ,
                
            }
        }
    }

});