{!! csrf_field() !!}
<div class="form-group">
    {!!Form::label('rut','Rut: ')!!}
    {!!Form::text('rut',null, ['id'=>'rut','class'=>'form-control rut', 'placeholder' => 'Ingresa el RUT del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('full_name','Nombre: ')!!}
    {!!Form::text('full_name',null, ['id'=>'userName','class'=>'form-control', 'placeholder' => 'Ingresa el nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('email','Correo: ')!!}
    {!!Form::email('email',null, ['id'=>'email','class'=>'form-control', 'placeholder' => 'Ingresa el correo del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('password','Contraseña: ')!!}
    {!!Form::password('password', ['id'=>'password','class'=>'form-control', 'placeholder' => 'Ingresa la contraseña del usuario'])!!}
</div>

{!! Form::hidden('role', 'apoderado', array('id' => 'role')) !!}


