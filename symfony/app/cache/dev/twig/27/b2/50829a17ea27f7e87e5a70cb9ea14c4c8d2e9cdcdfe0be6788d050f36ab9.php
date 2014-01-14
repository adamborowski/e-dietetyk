<?php

/* DietBundle::base.html.twig */
class __TwigTemplate_27b250829a17ea27f7e87e5a70cb9ea14c4c8d2e9cdcdfe0be6788d050f36ab9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
    ";
        // line 20
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "</head>
<body>
<div class=\"container\">

    <div class=\"masthead\">
        <h3 class=\"text-muted\">
            <a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("diet_homepage");
        echo "\" class=\"logo_link\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/images/apple.png"), "html", null, true);
        echo "\" alt=\"logo\"
                                                                         id=\"logo\">
                Twoja-dieta.eu</a>
        </h3>
        ";
        // line 33
        echo "        <ul class=\"nav nav-justified\">
            <li ";
        // line 34
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_homepage")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_homepage");
        echo "\">Start</a>
            </li>
            <li ";
        // line 36
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_profile")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_profile");
        echo "\">Twój
                    profil</a></li>
            <li ";
        // line 38
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_diet")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_diet");
        echo "\">Twoja dieta</a></li>
            <li ";
        // line 39
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_orders")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_orders");
        echo "\">Twoje
                    zamówienia</a></li>
            <li ";
        // line 41
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_customers")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_customers");
        echo "\">Nasi
                    klienci</a></li>
            <li ";
        // line 43
        echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method") == "diet_about")) ? (" class=\"active\"") : (""));
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("diet_about");
        echo "\">O nas</a></li>
        </ul>


    </div>

    ";
        // line 49
        $this->displayBlock('content', $context, $blocks);
        // line 52
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
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/diet/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
        // line 65
        $this->displayBlock('javascripts', $context, $blocks);
        // line 67
        echo "</body>
</html>


";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Twoja-dieta";
    }

    // line 20
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 21
        echo "    ";
    }

    // line 49
    public function block_content($context, array $blocks = array())
    {
        // line 50
        echo "        treść
    ";
    }

    // line 65
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  179 => 65,  174 => 50,  171 => 49,  167 => 21,  164 => 20,  158 => 10,  150 => 67,  148 => 65,  144 => 63,  131 => 52,  129 => 49,  118 => 43,  111 => 41,  104 => 39,  98 => 38,  91 => 36,  84 => 34,  81 => 33,  72 => 28,  64 => 22,  61 => 20,  57 => 18,  52 => 16,  48 => 15,  44 => 14,  38 => 11,  34 => 10,  23 => 1,);
    }
}
