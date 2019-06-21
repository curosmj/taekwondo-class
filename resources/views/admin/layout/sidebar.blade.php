<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Forms</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/forms/student') }}"><i class="nav-icon icon-graduation"></i> Student Registration</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/forms/invoice') }}"><i class="nav-icon icon-open"></i> New Invoice </a></li>

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/people') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.person.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/students') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.student.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/products') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.product.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/inventories') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.inventory.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/services') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.service.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/invoices') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.invoice.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/invoice-items') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.invoice-item.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ranks') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.rank.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-ranks') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.student-rank.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/batches') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.batch.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/schedules') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.schedule.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/attendances') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.attendance.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
