<div class="form-group row align-items-center" :class="{'has-danger': errors.has('product_id'), 'has-success': this.fields.product_id && this.fields.product_id.valid }">
    <label for="product_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice-item.columns.product_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.product_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('product_id'), 'form-control-success': this.fields.product_id && this.fields.product_id.valid}" id="product_id" name="product_id" placeholder="{{ trans('admin.invoice-item.columns.product_id') }}">
        <div v-if="errors.has('product_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('product_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('invoice_id'), 'has-success': this.fields.invoice_id && this.fields.invoice_id.valid }">
    <label for="invoice_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice-item.columns.invoice_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.invoice_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('invoice_id'), 'form-control-success': this.fields.invoice_id && this.fields.invoice_id.valid}" id="invoice_id" name="invoice_id" placeholder="{{ trans('admin.invoice-item.columns.invoice_id') }}">
        <div v-if="errors.has('invoice_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('invoice_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_id'), 'has-success': this.fields.service_id && this.fields.service_id.valid }">
    <label for="service_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice-item.columns.service_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_id'), 'form-control-success': this.fields.service_id && this.fields.service_id.valid}" id="service_id" name="service_id" placeholder="{{ trans('admin.invoice-item.columns.service_id') }}">
        <div v-if="errors.has('service_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantity'), 'has-success': this.fields.quantity && this.fields.quantity.valid }">
    <label for="quantity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice-item.columns.quantity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantity" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantity'), 'form-control-success': this.fields.quantity && this.fields.quantity.valid}" id="quantity" name="quantity" placeholder="{{ trans('admin.invoice-item.columns.quantity') }}">
        <div v-if="errors.has('quantity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantity') }}</div>
    </div>
</div>


