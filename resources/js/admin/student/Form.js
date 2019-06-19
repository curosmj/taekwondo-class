import AppForm from '../app-components/Form/AppForm';

Vue.component('student-form', {
    mixins: [AppForm],
    mounted: async function () {
        this.persons = ((await axios.get('/admin/people')).data.data.data)
    },
    data: function() {  
        return {
            persons: [],
            form: {
                dob:  '' ,
                address:  '' ,
                mother_id:  '' ,
                father_id:  '' ,
                status:  '' ,
                
            }
        }
    },
    computed: {
        males: function () {
            return this.persons.filter((p) => p.person_gender == 'male')
        },
        females: function () {
            return this.persons.filter((p) => p.person_gender == 'female')
        }
    }
});