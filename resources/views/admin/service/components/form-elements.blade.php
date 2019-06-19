<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_name'), 'has-success': this.fields.service_name && this.fields.service_name.valid }">
    <label for="service_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.service.columns.service_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_name'), 'form-control-success': this.fields.service_name && this.fields.service_name.valid}" id="service_name" name="service_name" placeholder="{{ trans('admin.service.columns.service_name') }}">
        <div v-if="errors.has('service_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_description'), 'has-success': this.fields.service_description && this.fields.service_description.valid }">
    <label for="service_description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.service.columns.service_description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_description" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_description'), 'form-control-success': this.fields.service_description && this.fields.service_description.valid}" id="service_description" name="service_description" placeholder="{{ trans('admin.service.columns.service_description') }}">
        <div v-if="errors.has('service_description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_selling_price'), 'has-success': this.fields.service_selling_price && this.fields.service_selling_price.valid }">
    <label for="service_selling_price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.service.columns.service_selling_price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_selling_price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_selling_price'), 'form-control-success': this.fields.service_selling_price && this.fields.service_selling_price.valid}" id="service_selling_price" name="service_selling_price" placeholder="{{ trans('admin.service.columns.service_selling_price') }}">
        <div v-if="errors.has('service_selling_price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_selling_price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_num_days'), 'has-success': this.fields.service_num_days && this.fields.service_num_days.valid }">
    <label for="service_num_days" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.service.columns.service_num_days') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_num_days" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_num_days'), 'form-control-success': this.fields.service_num_days && this.fields.service_num_days.valid}" id="service_num_days" name="service_num_days" placeholder="{{ trans('admin.service.columns.service_num_days') }}">
        <div v-if="errors.has('service_num_days')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_num_days') }}</div>
    </div>
</div>


