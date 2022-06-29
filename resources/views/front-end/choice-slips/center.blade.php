<div class="form-group" >
    {{ Form::label("center_id", 'Center/মেডিকেল নির্বাচন করুন')}}
    {{Form::select('center_name', $centers, old('center_name') ? old('center_name') : (!empty($choiceslip) ? $choiceslip->center_name : null),
            ['class' => 'form-control','id' => 'center_id', 'placeholder' => 'Select Center']
    )}}
</div> <!-- end form-group -->
