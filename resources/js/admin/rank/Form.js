import AppForm from '../app-components/Form/AppForm';

Vue.component('rank-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                rank_name:  '' ,
                rank_description:  '' ,
                rank_order:  '' ,
                
            }
        }
    }

});