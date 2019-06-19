<div class="form-group row align-items-center" :class="{'has-danger': errors.has('{{$field}}'), 'has-success': this.fields.{{$field}} && this.fields.{{$field}}.valid }">
    <label for="{{$field}}" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{$label}}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.{{$field}}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('{{$field}}'), 'form-control-success': this.fields.{{$field}} && this.fields.{{$field}}.valid}" id="{{$field}}" name="{{$field}}">        
        <div v-if="errors.has('{{$field}}')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('<?php echo $field; ?>') }}</div>
    </div>
</div>