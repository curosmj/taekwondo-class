<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('batch_id'), 'has-success': this.fields.batch_id && this.fields.batch_id.valid }">
    <label for="batch_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.batch_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('batch_id'), 'form-control-success': this.fields.batch_id && this.fields.batch_id.valid}" id="batch_id" name="batch_id" placeholder="{{ trans('admin.attendance.columns.batch_id') }}">
        <div v-if="errors.has('batch_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batch_id') }}</div>
    </div>
</div> -->


@component('select-element', ['field' => 'batch_id', 'label' => 'Batch'])
<option v-for="r in batches" v-bind:key="r.id" v-bind:value="r.id">@{{r.batch_name}}</option>
@endcomponent

@component('select-element', ['field' => 'student_id', 'label' => 'Student'])
<option v-for="r in students" v-bind:key="r.id" v-bind:value="r.id">@{{r.person.person_fname}} @{{r.person.person_lname}}</option>
@endcomponent

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id && this.fields.student_id.valid }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.student_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id && this.fields.student_id.valid}" id="student_id" name="student_id" placeholder="{{ trans('admin.attendance.columns.student_id') }}">
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comment'), 'has-success': this.fields.comment && this.fields.comment.valid }">
    <label for="comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.attendance.columns.comment') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comment" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comment'), 'form-control-success': this.fields.comment && this.fields.comment.valid}" id="comment" name="comment" placeholder="{{ trans('admin.attendance.columns.comment') }}">
        <div v-if="errors.has('comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comment') }}</div>
    </div>
</div>


