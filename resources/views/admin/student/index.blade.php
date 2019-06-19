@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student.actions.index'))

@section('body')

<?php $data->load('person', 'mother', 'father'); ?>
    <student-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/students') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.student.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.student.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.student.columns.id') }}</th>
                                    <th is='sortable' :column="'dob'">{{ trans('admin.student.columns.dob') }}</th>
                                    <th is='sortable' :column="'person_id'">Name</th>
                                    <th is='sortable' :column="'mother_id'">Mother Name</th>
                                    <th is='sortable' :column="'father_id'">Father Name</th>
                                    <th is='sortable' :column="'status'">{{ trans('admin.student.columns.status') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.dob | date }}</td>
                                    <td>@{{ item.person != null ? (item.person.person_fname + ' ' + item.person.person_lname) : '' }}</td>
                                    <td>@{{ item.mother != null ? (item.mother.person_fname + ' ' + item.mother.person_lname) : '' }}</td>
                                    <td>@{{ item.father != null ? (item.father.person_fname + ' ' + item.father.person_lname) : ''  }}</td>
                                    <td>@{{ item.status }}</td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.student.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </student-listing>

@endsection