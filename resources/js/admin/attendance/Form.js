import AppForm from '../app-components/Form/AppForm';

Vue.component('attendance-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.batches = ((await axios.get('/admin/batches')).data.data.data)
        this.students = ((await axios.get('/admin/students')).data.data.data)
    },
    data: function() {
        return {
            batches: [],
            students: [],
            form: {
                batch_id:  '' ,
                student_id:  '' ,
                comment:  '' ,
                
            }
        }
    }

});