<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield('title', 'Jardin infantil Papelucho')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {!!Html::style('css/style.css')!!}
    {!!Html::style('css/normalize.css')!!}
    {!!Html::style('//fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister')!!}
    {!!Html::style('//fonts.googleapis.com/css?family=Fredericka+the+Great')!!}
    {!!Html::style('//allfont.es/allfont.css?fonts=linotypezapfino-one')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/font-awesome.css')!!}
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/jquery.cycle2.min.js')!!}
    {!!Html::script('js/menu.js')!!}


    @yield('meta')
</head>
<body>
<header>
    <div class="logo">
        <a href="#" >{!!Html::image('images/isologo.png', 'Isologo', array('id' => 'img-isologo'))!!}</a>
        <a href="#" >{!!Html::image('images/logotipo.png', 'Logotipo', array('id' => 'img-logotipo'))!!}</a>
        <div id="sidebar-btn">
            <a href="#">{!!Html::image('images/menu-icon.png', 'Icono Menu', array('id' => 'img-menu'))!!}</a>
        </div>
    </div>

    {!!Html::image('images/fondo-arco-verde.png', 'Arco Verde', array('id' => 'img-arco-verde'))!!}
    <div id="zona-apoderados">
        <ul >
            <li id="li-zona-apoderados"><a href="#">Zona Apoderados</a></li>
        </ul>
    </div>
<nav id="sidebar">
    <ul>
        <li>{!!HTML::linkAction('PagesControllers\HomeControllers@index', 'Home')!!}</li>
        <li>{!!HTML::linkAction('PagesControllers\MiJardinController@index', 'Mi jardín')!!}</li>
        <li class="li-two-lines">{!!HTML::linkAction('PagesControllers\LasColoniasController@index', 'Papelucho',array(), array('class' => 'url-menu'))!!}<br>
        {!!HTML::linkAction('PagesControllers\LasColoniasController@index', 'Las Colonias',array(), array('class' => 'url-menu'))!!}</li>
        <li class="li-two-lines">{!!HTML::linkAction('PagesControllers\BlumellController@index', 'Papelucho',array(), array('class' => 'url-menu'))!!}<br>
        {!!HTML::linkAction('PagesControllers\BlumellController@index', 'Blumell',array(), array('class' => 'url-menu'))!!}</li>
    </ul>
</nav>

    <div class="cycle-slideshow">

        <span class="cycle-prev">&#9001;</span>
        <span class="cycle-next">&#9002;</span>
        <span class="cycle-pager"></span>

        {!!Html::image('images/img1.jpg','img1' ,array('class' => 'img-slide'))!!}
        {!!Html::image('images/img2.jpg','img2', array('class' => 'img-slide'))!!}
        {!!Html::image('images/img3.jpg','img3', array('class' => 'img-slide'))!!}
        {!!Html::image('images/img4.jpg','img4', array('class' => 'img-slide'))!!}
    </div>
</header>
<section>
    <div id="puzzle">
        {!!Html::image('images/puzzle.png', 'Puzzle')!!}
    </div>
    <h1 id="page-title">@yield('page-title')</h1>

    <article>
        @yield('article')
    </article>
</section>

<aside>
    @yield('aside')
</aside>
{!!Html::image('images/fondo-arco-azul.png', 'Arco Azul', array('id' => 'img-arco-azul'))!!}
<footer>
    <div class="footer-box">
    <h3>Blumell</h3>
    <p>
        <span class="span-ico-footer">{!!Html::image('images/ico-mapa.png', 'ico-mapa', array('class' => 'span-ico-footer'))!!} Blumell 049 Playa Blanca</span><br>
        <span class="span-ico-footer">{!!Html::image('images/ico-fono.png', 'ico-fono', array('class' => 'span-ico-footer'))!!} 55 245 4645</span><br>
        <span class="span-ico-footer">{!!Html::image('images/ico-mail.png', 'ico-mail', array('class' => 'span-ico-footer'))!!} infoblumell@jardinpapelucho.cl</span>
    </p>
    </div>
    <div class="footer-box">
    <h3>Las Colonias</h3>
    <p>
        <span class="span-ico-footer"> {!!Html::image('images/ico-mapa.png', 'ico-mapa', array('class' => 'span-ico-footer'))!!} Las Colonias 557</span><br>
        <span class="span-ico-footer">{!!Html::image('images/ico-fono.png', 'ico-fono', array('class' => 'span-ico-footer'))!!} 55 245 4647 -  55 245 4648</span><br>
        <span class="span-ico-footer">{!!Html::image('images/ico-mail.png', 'ico-mail', array('class' => 'span-ico-footer'))!!} info@jardinpapelucho.cl</span>
    </p>
    </div>
    <p id="copyright">
        &copy; 2016 <a href="https://www.jardinpapelucho.cl">Jardín Papelucho</a>, Todos los derechos reservados.
        <a href="http://www.computecsos.com">{!!Html::image('images/logo-blanco.png', 'isologo-computecsos', array('id' => 'img-isologo-computecsos')) !!}</a>
    </p>

</footer>

</body>
</html>