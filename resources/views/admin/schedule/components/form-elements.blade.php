<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('day_of_week'), 'has-success': this.fields.day_of_week && this.fields.day_of_week.valid }">
    <label for="day_of_week" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.day_of_week') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.day_of_week" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('day_of_week'), 'form-control-success': this.fields.day_of_week && this.fields.day_of_week.valid}" id="day_of_week" name="day_of_week" placeholder="{{ trans('admin.schedule.columns.day_of_week') }}">
        <div v-if="errors.has('day_of_week')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('day_of_week') }}</div>
    </div>
</div> -->

@component('select-element', ['field' => 'day_of_week', 'label' => 'Day of Week'])
<option value="monday">Monday</option>
<option value="tuesday">Tuesday</option>
<option value="wednesday">Wednesday</option>
<option value="thursday">Thursday</option>
<option value="friday">Friday</option>
<option value="saturday">Saturday</option>
<option value="sunday">Sunday</option>
@endcomponent

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_time'), 'has-success': this.fields.start_time && this.fields.start_time.valid }">
    <label for="start_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.start_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.start_time" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_time'), 'form-control-success': this.fields.start_time && this.fields.start_time.valid}" id="start_time" name="start_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_time'), 'has-success': this.fields.end_time && this.fields.end_time.valid }">
    <label for="end_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.end_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.end_time" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end_time'), 'form-control-success': this.fields.end_time && this.fields.end_time.valid}" id="end_time" name="end_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_time') }}</div>
    </div>
</div>

@component('select-element', ['field' => 'batch_id', 'label' => 'Batch'])
<option v-for="p in batches" v-bind:key="p.id" v-bind:value="p.id">@{{p.batch_name}}</option>
@endcomponent

<!-- 
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('batch_id'), 'has-success': this.fields.batch_id && this.fields.batch_id.valid }">
    <label for="batch_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.batch_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('batch_id'), 'form-control-success': this.fields.batch_id && this.fields.batch_id.valid}" id="batch_id" name="batch_id" placeholder="{{ trans('admin.schedule.columns.batch_id') }}">
        <div v-if="errors.has('batch_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batch_id') }}</div>
    </div>
</div> -->


