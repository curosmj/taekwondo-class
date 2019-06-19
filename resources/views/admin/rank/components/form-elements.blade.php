<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rank_name'), 'has-success': this.fields.rank_name && this.fields.rank_name.valid }">
    <label for="rank_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.rank.columns.rank_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rank_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rank_name'), 'form-control-success': this.fields.rank_name && this.fields.rank_name.valid}" id="rank_name" name="rank_name" placeholder="{{ trans('admin.rank.columns.rank_name') }}">
        <div v-if="errors.has('rank_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rank_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rank_description'), 'has-success': this.fields.rank_description && this.fields.rank_description.valid }">
    <label for="rank_description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.rank.columns.rank_description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rank_description" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rank_description'), 'form-control-success': this.fields.rank_description && this.fields.rank_description.valid}" id="rank_description" name="rank_description" placeholder="{{ trans('admin.rank.columns.rank_description') }}">
        <div v-if="errors.has('rank_description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rank_description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rank_order'), 'has-success': this.fields.rank_order && this.fields.rank_order.valid }">
    <label for="rank_order" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.rank.columns.rank_order') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rank_order" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rank_order'), 'form-control-success': this.fields.rank_order && this.fields.rank_order.valid}" id="rank_order" name="rank_order" placeholder="{{ trans('admin.rank.columns.rank_order') }}">
        <div v-if="errors.has('rank_order')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rank_order') }}</div>
    </div>
</div>


