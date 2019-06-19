import AppForm from '../app-components/Form/AppForm';

Vue.component('invoice-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                amount:  '' ,
                person_id:  '' ,
                
            }
        }
    }

});