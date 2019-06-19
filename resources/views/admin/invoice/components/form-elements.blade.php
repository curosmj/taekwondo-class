<div class="form-group row align-items-center" :class="{'has-danger': errors.has('amount'), 'has-success': this.fields.amount && this.fields.amount.valid }">
    <label for="amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice.columns.amount') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.amount" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('amount'), 'form-control-success': this.fields.amount && this.fields.amount.valid}" id="amount" name="amount" placeholder="{{ trans('admin.invoice.columns.amount') }}">
        <div v-if="errors.has('amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('person_id'), 'has-success': this.fields.person_id && this.fields.person_id.valid }">
    <label for="person_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.invoice.columns.person_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.person_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('person_id'), 'form-control-success': this.fields.person_id && this.fields.person_id.valid}" id="person_id" name="person_id" placeholder="{{ trans('admin.invoice.columns.person_id') }}">
        <div v-if="errors.has('person_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('person_id') }}</div>
    </div>
</div>


