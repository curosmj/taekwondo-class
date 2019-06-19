<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dob'), 'has-success': this.fields.dob && this.fields.dob.valid }">
    <label for="dob" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.dob') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.dob" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('dob'), 'form-control-success': this.fields.dob && this.fields.dob.valid}" id="dob" name="dob" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('dob')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dob') }}</div>
    </div>
</div>

@component('select-element', ['field' => 'person_id', 'label' => 'Person Record'])
<option v-bind:value="null">None</option>
<option v-for="p in persons" v-bind:key="p.id" v-bind:value="p.id">@{{p.person_fname}} @{{p.person_lname}} - @{{p.email}}</option>
@endcomponent

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mother_id'), 'has-success': this.fields.mother_id && this.fields.mother_id.valid }">
    <label for="mother_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.mother_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.mother_id" @input="validate($event)" :class="{'form-control-danger': errors.has('mother_id'), 'form-control-success': this.fields.mother_id && this.fields.mother_id.valid}" id="mother_id" name="mother_id">
            <option v-bind:value="null">None</option>
            <option v-for="p in females" v-bind:key="p.id" v-bind:value="p.id">@{{p.person_fname}} @{{p.person_lname}} - @{{p.email}}</option>
        </select>
        <!-- <input type="text" v-model="form.mother_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mother_id'), 'form-control-success': this.fields.mother_id && this.fields.mother_id.valid}" id="mother_id" name="mother_id" placeholder="{{ trans('admin.student.columns.mother_id') }}"> -->
        <div v-if="errors.has('mother_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mother_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('father_id'), 'has-success': this.fields.father_id && this.fields.father_id.valid }">
    <label for="father_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.father_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.father_id" @input="validate($event)" :class="{'form-control-danger': errors.has('father_id'), 'form-control-success': this.fields.father_id && this.fields.father_id.valid}" id="father_id" name="father_id">
            <option v-bind:value="null">None</option>
            <option v-for="p in males" v-bind:key="p.id" v-bind:value="p.id">@{{p.person_fname}} @{{p.person_lname}} - @{{p.email}}</option>
        </select>
        <!-- <input type="text" v-model="form.father_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('father_id'), 'form-control-success': this.fields.father_id && this.fields.father_id.valid}" id="father_id" name="father_id" placeholder="{{ trans('admin.student.columns.father_id') }}"> -->
        <div v-if="errors.has('father_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('father_id') }}</div>
    </div>
</div>

@component('select-element', ['field' => 'status', 'label' => 'Status'])
<option>Active</option>
<option>Inactive</option>
@endcomponent

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': this.fields.status && this.fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status'), 'form-control-success': this.fields.status && this.fields.status.valid}" id="status" name="status" placeholder="{{ trans('admin.student.columns.status') }}">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div> -->


