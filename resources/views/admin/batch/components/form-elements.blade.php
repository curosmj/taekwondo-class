<div class="form-group row align-items-center" :class="{'has-danger': errors.has('batch_name'), 'has-success': this.fields.batch_name && this.fields.batch_name.valid }">
    <label for="batch_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.batch.columns.batch_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('batch_name'), 'form-control-success': this.fields.batch_name && this.fields.batch_name.valid}" id="batch_name" name="batch_name" placeholder="{{ trans('admin.batch.columns.batch_name') }}">
        <div v-if="errors.has('batch_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batch_name') }}</div>
    </div>
</div>

@component('select-element', ['field' => 'batch_rank_id', 'label' => 'Rank'])
<option v-for="p in ranks" v-bind:key="p.id" v-bind:value="p.id">@{{p.rank_name}}</option>
@endcomponent

<!-- 
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('batch_rank_id'), 'has-success': this.fields.batch_rank_id && this.fields.batch_rank_id.valid }">
    <label for="batch_rank_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.batch.columns.batch_rank_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch_rank_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('batch_rank_id'), 'form-control-success': this.fields.batch_rank_id && this.fields.batch_rank_id.valid}" id="batch_rank_id" name="batch_rank_id" placeholder="{{ trans('admin.batch.columns.batch_rank_id') }}">
        <div v-if="errors.has('batch_rank_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batch_rank_id') }}</div>
    </div>
</div> -->


