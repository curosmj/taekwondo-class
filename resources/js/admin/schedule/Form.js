import AppForm from '../app-components/Form/AppForm';

Vue.component('schedule-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.batches = ((await axios.get('/admin/batches')).data.data.data)
    },
    data: function() {
        return {
            batches: [],
            form: {
                day_of_week:  '' ,
                start_time:  '' ,
                end_time:  '' ,
                batch_id:  '' ,
                
            }
        }
    }

});