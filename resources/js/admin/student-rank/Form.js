import AppForm from '../app-components/Form/AppForm';

Vue.component('student-rank-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.ranks = ((await axios.get('/admin/ranks')).data.data.data)
        this.students = ((await axios.get('/admin/students')).data.data.data)
    },
    data: function() {
        return {
            ranks: [],
            students: [],
            form: {
                rank_id:  '' ,
                student_id:  '' ,
                awarded_date:  '' ,
                
            }
        }
    }

});