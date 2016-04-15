
    <table class="table table-striped">
        <tbody id="tb-noticias">
        <tr id="t-header-content-principal">
            <th>Id</th>
            <th>Titulo</th>
            <th>Contenido de Noticia</th>
            <th>Publicado</th>
            <th>Acciones</th>
        </tr>
        @foreach($noticias as $noticia)
            <tr data-id="{{ $noticia->id }}">
                <td>{!! $noticia->id !!}</td>
                <td>{!! $noticia->title !!}</td>
                <td>{!! $noticia->content !!}</td>
                <td>{!! $noticia->publish !!}</td>
                <td>
                    <div class="t-actions">
                        <a href="#"><i class="fa fa-pencil"></i></a>
                        <a href="#" type="submit" class="btn-delete-noticia"><i class="fa fa-trash-o"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $noticias -> render() !!}
