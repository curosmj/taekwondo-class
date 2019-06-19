<div class="form-group row align-items-center" :class="{'has-danger': errors.has('{{$field}}'), 'has-success': this.fields.{{$field}} && this.fields.{{$field}}.valid }">
    <label for="father_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{$label}}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.{{$field}}" @input="validate($event)" :class="{'form-control-danger': errors.has('{{$field}}'), 'form-control-success': this.fields.{{$field}} && this.fields.{{$field}}.valid}" id="{{$field}}" name="{{$field}}">
            {{$slot}}
        </select>
        <div v-if="errors.has('{{$field}}')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('<?php echo $field; ?>') }}</div>
    </div>
</div>