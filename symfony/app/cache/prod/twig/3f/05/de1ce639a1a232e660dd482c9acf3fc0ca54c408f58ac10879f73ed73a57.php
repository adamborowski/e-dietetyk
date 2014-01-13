<?php

/* DietBundle::base.html.twig */
class __TwigTemplate_3f05de1ce639a1a232e660dd482c9acf3fc0ca54c408f58ac10879f73ed73a57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta name=\"description\" content=\"Twoja-dieta.eu to miejsce, w którym ułożysz własną wymarzoną dietę.\">
  <meta name=\"author\" content=\"Maciej Rzymski Adam Borowski\">

  <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo " - twoja-dieta.eu</title>
  <link rel=\"icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/images/apple-icon.png"), "html", null, true);
        echo "\" type=\"image/png\">

  <!-- load css -->
  <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
  <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
  <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/css/justified-nav.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

</head>
<body>
<div class=\"container\">

  <div class=\"masthead\">
    <h3 class=\"text-muted\">
      <a href=\"#\"><img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/images/apple.png"), "html", null, true);
        echo "\" alt=\"logo\" id=\"logo\"></a>
      Twoja-dieta.eu
    </h3>
    <ul class=\"nav nav-justified\">
      <li class=\"active\"><a href=\"#\">Start</a></li>
      <li><a href=\"#\">Twój profil</a></li>
      <li><a href=\"#\">Twoja dieta</a></li>
      <li><a href=\"#\">Nasi klienci</a></li>
      <li><a href=\"#\">O nas</a></li>
      <li><a href=\"#\">Kontakt</a></li>
    </ul>
  </div>

  <!-- Jumbotron -->
  <div class=\"jumbotron\">
    <h1>Twoja dieta</h1>
    <p class=\"lead\">Załóż profil, ułóż dietę i dobierz ulubione produkty.</p>
    <p>Tak to działa! Szybko, wygodnie i co najważniejsze dokładnie.</p>
    <p>Bez ściemy.</p>
    <p>&nbsp;</p>
    <p><a class=\"btn btn-lg btn-success\" href=\"#\" role=\"button\">Rozpocznij teraz</a></p>
  </div>

  <!-- Example row of columns -->
  <div class=\"row\">
    <div class=\"col-lg-4\">
      <h2>Twój profil</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">Poznaj szczegóły &raquo;</a></p>
    </div>
    <div class=\"col-lg-4\">
      <h2>Twoja dieta</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">Poznaj szczegóły &raquo;</a></p>
    </div>
    <div class=\"col-lg-4\">
      <h2>Twoje produkty</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
      <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">Poznaj szczegóły &raquo;</a></p>
    </div>
  </div>

  <!-- Site footer -->
  <div class=\"footer\">
    <p>&copy; Rzymski&Borowski 2013</p>
  </div>

  </div> <!-- /container -->

<!-- load scripts -->
  <script src=\"https://code.jquery.com/jquery.js\"></script>
  <script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
</body>
</html>


";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Twoja-dieta";
    }

    public function getTemplateName()
    {
        return "DietBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 10,  114 => 75,  60 => 24,  49 => 16,  45 => 15,  41 => 14,  35 => 11,  31 => 10,  20 => 1,  28 => 3,);
    }
}
