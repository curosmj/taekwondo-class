@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'Create Invoice Form')

@section('body')

    <div class="container-xl" v-cloak>

        <div class="card">
            <forms-invoice :action="'{{ url('admin/forms/invoice') }}'" inline-template>
                <form class="form-horizontal form-create" method="post" @submit.prevent="nothing" novalidate>
                  <div class="card-header">
                      <i class="fa fa-plus"></i> Create New Invoice
                  </div>

                  <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <h5>Add New Product</h5>
                    
                      @component('select-element', ['field' => 'newProduct', 'label' => 'Product'])
                      <option v-for="r in products" v-bind:key="r.id" v-bind:value="r">@{{r.name}}</option>
                      @endcomponent
                    
                      <button type="button" @click="addProduct()" class="btn btn-primary" :disabled="submiting">
                        Add
                      </button>
                    </div>
                    <div class="col-md-6">
                      <h5>Add New Service</h5>
                    
                      @component('select-element', ['field' => 'newService', 'label' => 'Service'])
                      <option v-for="r in services" v-bind:key="r.id" v-bind:value="r">@{{r.service_name}}</option>
                      @endcomponent

                    
                      <button type="button" @click="addService()" class="btn btn-primary" :disabled="submiting">
                        Add
                      </button>
                    </div>
                  </div>
                  <hr />
                  <table class="table table-hover table-listing">
                    <thead>
                      <tr>
                          <th>Item</th>
                          <th>Type</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-if="items.length == 0">
                        <td colspan=6>
                          <i>No Items</i>
                        </td>
                      </tr>
                      <tr v-for="(item, index) in items">
                          <td>@{{ item.name || item.service_name }}</td>
                          <td>@{{ item.type }}</td>
                          <td>@{{ item.selling_price || item.service_selling_price }}</td>
                          <td>
                            @{{ item.quantity }} <br />
                            <small>
                              <a href="#" @click="item.quantity++">+1</a> | 
                              <a href="#" @click="item.quantity--">-1</a>
                            </small>
                          
                          </td>
                          <td>$@{{ (item.quantity * (item.selling_price || item.service_selling_price)).toFixed(2) }}</td>
                          
                          <td>
                              <div class="row no-gutters">
                                  <!-- <div class="col-auto">
                                      <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                  </div> -->
                                  <div class="col">
                                    <button type="button" @click.prevent="del(index)" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr v-if="items.length !== 0">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <b>Total</b>
                        </td>
                        <td>$@{{total}}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>

                  <hr />
                  
                  @component('select-element', ['field' => 'person_id', 'label' => 'Person'])
                  <option v-for="r in persons" v-bind:key="r.id" v-bind:value="r.id">@{{r.full_name}}</option>
                  @endcomponent

                  <div class="card-footer">
                    <button @click="create" type="button" :disabled="items.length == 0 || !form.person_id" class="btn btn-primary pull-right" :disabled="submiting">
                      Create Invoice
                    </button>
                  </div>

              </form>
            </forms-student>

        </div>

    </div>

@endsection