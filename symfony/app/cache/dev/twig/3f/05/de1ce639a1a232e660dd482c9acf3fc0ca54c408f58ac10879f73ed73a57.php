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
            'content' => array($this, 'block_content'),
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

    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/css/site.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

</head>
<body>
<div class=\"container\">

    <div class=\"masthead\">
        <h3 class=\"text-muted\">
            <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("diet_homepage");
        echo "\" class=\"logo_link\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/images/apple.png"), "html", null, true);
        echo "\" alt=\"logo\" id=\"logo\">
            Twoja-dieta.eu</a>
        </h3>
        <ul class=\"nav nav-justified\">
            <li class=\"active\"><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("diet_homepage");
        echo "\">Start</a></li>
            <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("diet_profile");
        echo "\">Twój profil</a></li>
            <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("diet_diet");
        echo "\">Twoja dieta</a></li>
            <li><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("diet_orders");
        echo "\">Twoje zamówienia</a></li>
            <li><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("diet_customers");
        echo "\">Nasi klienci</a></li>
            <li><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("diet_about");
        echo "\">O nas</a></li>
        </ul>
    </div>

    ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "
    <!-- Site footer -->
    <div class=\"footer\">
        <p>&copy; Rzymski&Borowski 2013</p>
    </div>

</div>
<!-- /container -->

<!-- load scripts -->
<script src=\"https://code.jquery.com/jquery.js\"></script>
<script src=\"";
        // line 53
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

    // line 39
    public function block_content($context, array $blocks = array())
    {
        // line 40
        echo "treść
    ";
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
        return array (  136 => 40,  133 => 39,  127 => 10,  117 => 53,  104 => 42,  102 => 39,  95 => 35,  91 => 34,  87 => 33,  83 => 32,  79 => 31,  75 => 30,  66 => 26,  55 => 18,  50 => 16,  46 => 15,  42 => 14,  36 => 11,  32 => 10,  21 => 1,);
    }
}
