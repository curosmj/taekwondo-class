import AppForm from '../app-components/Form/AppForm';
import moment from 'moment'

Vue.component('forms-student', {
  mixins: [AppForm],
  async mounted () {
    this.persons = ((await axios.get('/admin/people?perPage=100')).data.data.data)
    this.ranks = ((await axios.get('/admin/ranks?perPage=100')).data.data.data)

    this.form.rank_id = _.find(this.ranks, {rank_order: 1}).id
    this.form.awarded_date = moment().format()
    this.form.dob = "01.01.2005"
  },
  data () {
      return {
        persons: [],
        ranks: [],
        form: {
          person_id: null,
          father_id: null,
          status: 'Active'
        },
        submiting: false
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