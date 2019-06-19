<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('rank_id'), 'has-success': this.fields.rank_id && this.fields.rank_id.valid }">
    <label for="rank_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-rank.columns.rank_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rank_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rank_id'), 'form-control-success': this.fields.rank_id && this.fields.rank_id.valid}" id="rank_id" name="rank_id" placeholder="{{ trans('admin.student-rank.columns.rank_id') }}">
        <div v-if="errors.has('rank_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rank_id') }}</div>
    </div>
</div> -->

@component('select-element', ['field' => 'rank_id', 'label' => 'Rank'])
<option v-for="r in ranks" v-bind:key="r.id" v-bind:value="r.id">@{{r.rank_name}}</option>
@endcomponent

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id && this.fields.student_id.valid }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-rank.columns.student_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id && this.fields.student_id.valid}" id="student_id" name="student_id" placeholder="{{ trans('admin.student-rank.columns.student_id') }}">
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div> -->

@component('select-element', ['field' => 'student_id', 'label' => 'Student'])
<option v-for="r in students" v-bind:key="r.id" v-bind:value="r.id">@{{r.person.person_fname}} @{{r.person.person_lname}}</option>
@endcomponent

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('awarded_date'), 'has-success': this.fields.awarded_date && this.fields.awarded_date.valid }">
    <label for="awarded_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-rank.columns.awarded_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.awarded_date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('awarded_date'), 'form-control-success': this.fields.awarded_date && this.fields.awarded_date.valid}" id="awarded_date" name="awarded_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('awarded_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('awarded_date') }}</div>
    </div>
</div>


