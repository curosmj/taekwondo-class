@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'Create Student Form')

@section('body')

    <div class="container-xl">

        <div class="card">
            <forms-student :action="'{{ url('admin/forms/student') }}'" inline-template>
                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" novalidate>
                  <div class="card-header">
                      <i class="fa fa-plus"></i> Create New Student Form
                  </div>

                  <div class="card-body">

                    <h5>Select person record:</h5>
                    @component('select-element', ['field' => 'person_id', 'label' => 'Person'])
                    <option v-bind:value="null">Add New</option>
                    <option v-for="p in persons" v-bind:key="p.id" v-bind:value="p.id">@{{p.full_name}}</option>
                    @endcomponent

                    <div v-if="form.person_id == null">
                    <h5>Create New</h5>

                    @include('../admin/person/components/form-elements')
                    </div>

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

                    @component('select-element', ['field' => 'status', 'label' => 'Status'])
                    <option>Active</option>
                    <option>Inactive</option>
                    @endcomponent

                    <hr />

                    <h5>Student Belt Details</h5>

                    @component('select-element', ['field' => 'rank_id', 'label' => 'Rank'])
                    <option v-for="r in ranks" v-bind:key="r.id" v-bind:value="r.id">@{{r.rank_name}}</option>
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
                    <hr />
                    
                    <h5>Select father's record:</h5>
                    @component('select-element', ['field' => 'father_id', 'label' => 'Father'])
                    <option v-bind:value="null">Add New</option>
                    <option v-for="p in males" v-bind:key="p.id" v-bind:value="p.id">@{{p.full_name}}</option>
                    @endcomponent

                    <div v-if="form.father_id == null">
                    <h5>Create New</h5>

                    
                    @component('input-element', ['field' => 'father_fname', 'label' => 'First Name'])
                    @endcomponent

                    @component('input-element', ['field' => 'father_lname', 'label' => 'Last Name'])
                    @endcomponent

                    @component('input-element', ['field' => 'father_address', 'label' => 'Address'])
                    @endcomponent

                    @component('input-element', ['field' => 'father_postal_code', 'label' => 'Postal code'])
                    @endcomponent

                    @component('input-element', ['field' => 'father_mobile_no', 'label' => 'Mobile Number'])
                    @endcomponent

                    @component('input-element', ['field' => 'father_email', 'label' => 'Email'])
                    @endcomponent
                    </div>

                    <hr />

                    <h5>Select mother's record:</h5>
                    @component('select-element', ['field' => 'mother_id', 'label' => 'Mother'])
                    <option v-bind:value="null">Add New</option>
                    <option v-for="p in females" v-bind:key="p.id" v-bind:value="p.id">@{{p.full_name}}</option>
                    @endcomponent

                    <div v-if="form.mother_id == null">
                    <h5>Create New</h5>

                    @component('input-element', ['field' => 'mother_fname', 'label' => 'First Name'])
                    @endcomponent

                    @component('input-element', ['field' => 'mother_lname', 'label' => 'Last Name'])
                    @endcomponent

                    @component('input-element', ['field' => 'mother_address', 'label' => 'Address'])
                    @endcomponent

                    @component('input-element', ['field' => 'mother_postal_code', 'label' => 'Postal code'])
                    @endcomponent

                    @component('input-element', ['field' => 'mother_mobile_no', 'label' => 'Mobile Number'])
                    @endcomponent

                    @component('input-element', ['field' => 'mother_email', 'label' => 'Email'])
                    @endcomponent
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                      <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                      Save
                    </button>
                  </div>

              </form>
            </forms-student>

        </div>

    </div>

@endsection