@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.batch.actions.edit', ['name' => $batch->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <batch-form
                :action="'{{ $batch->resource_url }}'"
                :data="{{ $batch->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.batch.actions.edit', ['name' => $batch->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.batch.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </batch-form>

    </div>

</div>

@endsection