<div>
    <ul id="archivosTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#imagen" aria-controls="imagen" role="tab" data-toggle="tab"
                                                  data-type="galerias-jardines">Imágen</a>
        </li>
        <li role="presentation"><a href="#informe" aria-controls="informe" role="tab" data-toggle="tab"
                                   data-type="parvulos">Informe al
                Hogar</a></li>
        <li role="presentation"><a href="#boletin" aria-controls="boletin" role="tab" data-toggle="tab"
                                   data-type="niveles">Boletín
                Semanal</a></li>
        <li role="presentation"><a href="#informacion" aria-controls="informacion" role="tab" data-toggle="tab"
                                   data-type="general">Información
                General</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active panel-option" id="imagen">
            <div class="col-lg-8 container-option">
                {!! Form::open($makeForm, ['method'=>'get','id' => 'searchform', 'class' => 'form'])!!}
                {!! Field::select('jardin_id',$jardines,['name' => 'jardines' ])!!}
                {!! Field::select('galeria_id',$galerias,['name' => 'galerias' ]) !!}
                {!! Form::close()!!}
            </div>
            <div class="col-lg-4 btn-galery">
                <a class="btn btn-primary pull-right btn-crear-nuevo"
                   href="{{ route('administrador.galerias.index') }}">
                    <i class="fa fa-picture-o"> <span class="button-title">Crear Galería</span></i></a>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane panel-option" id="informe">
            <div class="col-lg-8 container-option">
                {!! Form::open(['class' => 'form']) !!}
                {{-- {!! Form::label('nombreParvulo','Ingrese nombre del párvulo: ') !!} --}}
                {!! Field::text('Párvulo',['class'=>'easy-autocomplete','id'=>'user', 'placeholder'=>'Ingrese un párvulo']) !!}
                {!! Form::hidden('parvulos',null, ['id'=>'user_id']) !!}
                {!! Form::close()!!}
            </div>
        </div>
        <div role="tabpanel" class="tab-pane panel-option" id="boletin">
            <div class="col-lg-8 container-option">
                {!! Form::open(['class' => 'form']) !!}
                {!! Field::select('Niveles',\App\Nivel::lists('name','id')->toArray(),['name'=>'niveles', 'class'=>'form']) !!}
                {!! Form::close()!!}
            </div>
        </div>
        <div role="tabpanel" class="tab-pane panel-option" id="informacion"></div>
    </div>
    {!! Form::hidden('type', 'galerias-jardines' , array('id' => 'type')) !!}
</div>