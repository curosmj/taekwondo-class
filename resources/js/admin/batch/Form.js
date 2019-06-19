import AppForm from '../app-components/Form/AppForm';

Vue.component('batch-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.ranks = ((await axios.get('/admin/ranks')).data.data.data)
    },
    data: function() {
        return {
            ranks: [],
            form: {
                batch_name:  '' ,
                batch_rank_id:  '' ,
                
            }
        }
    }

});