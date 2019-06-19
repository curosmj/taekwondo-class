<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('product_id'), 'has-success': this.fields.product_id && this.fields.product_id.valid }">
    <label for="product_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventory.columns.product_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.product_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('product_id'), 'form-control-success': this.fields.product_id && this.fields.product_id.valid}" id="product_id" name="product_id" placeholder="{{ trans('admin.inventory.columns.product_id') }}">
        <div v-if="errors.has('product_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('product_id') }}</div>
    </div>
</div> -->


@component('select-element', ['field' => 'product_id', 'label' => 'Product'])
<option v-for="p in products" v-bind:key="p.id" v-bind:value="p.id">@{{p.name}}</option>
@endcomponent

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('inventory_quantity'), 'has-success': this.fields.inventory_quantity && this.fields.inventory_quantity.valid }">
    <label for="inventory_quantity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventory.columns.inventory_quantity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.inventory_quantity" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('inventory_quantity'), 'form-control-success': this.fields.inventory_quantity && this.fields.inventory_quantity.valid}" id="inventory_quantity" name="inventory_quantity" placeholder="{{ trans('admin.inventory.columns.inventory_quantity') }}">
        <div v-if="errors.has('inventory_quantity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inventory_quantity') }}</div>
    </div>
</div>


