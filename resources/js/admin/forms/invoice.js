import AppForm from '../app-components/Form/AppForm';
import moment from 'moment'

Vue.component('forms-invoice', {
  mixins: [AppForm],
  async mounted () {
    this.products = ((await axios.get('/admin/products?perPage=100')).data.data.data)
    this.services = ((await axios.get('/admin/services?perPage=100')).data.data.data)
    this.persons = ((await axios.get('/admin/people?perPage=100')).data.data.data)
  },
  data () {
      return {
        products: [],
        persons: [],
        services: [],
        newQuantity: 1,
        items: [
          
        ],
        form: {
          person_id: null,
          newProduct: null,
          newService: null,
        },
        submiting: false
      }
  },
  methods: {
    nothing () {

    },
    async create () {
      ((await axios.post('/admin/forms/invoice', {items: this.items, person_id: this.form.person_id})))
      this.$notify('Invoice created!');
      window.location.reload(true)
    },
    del (index) {
      this.items.splice(index, 1)
    },
    addProduct () {
      let p = _.clone(this.form.newProduct)
      p.quantity = this.newQuantity
      p.type = 'product'
      this.items.push(p)
      this.newQuantity = 1
      this.form.newProduct = null
    },
    addService () {
      let p = _.clone(this.form.newService)
      p.quantity = this.newQuantity
      p.type = 'service'
      this.items.push(p)
      this.newQuantity = 1
      this.form.newService = null
    }
  },
  computed: {
    total () {
      return _.sumBy(this.items, (i) => i.quantity * (i.selling_price || i.service_selling_price)).toFixed(2)
    }
  }
});