import AppForm from '../app-components/Form/AppForm';

Vue.component('person-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                person_fname:  '' ,
                person_lname:  '' ,
                mobile_no:  '' ,
                email:  '' ,
                
            }
        }
    }

});