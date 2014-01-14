<?php

/* DietBundle:Default:profile.html.twig */
class __TwigTemplate_fe1e0d99a326022d20ec3494c27b40e8d9c2ec4550a58be36bb62ffa3d3431d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DietBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DietBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Twój profil";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->env->loadTemplate("DietBundle::spinner.html.twig")->display($context);
        // line 7
        echo "    <div id=\"ext-app-container\" style=\"visibility: hidden\">
        </div>
    <div class=\"a-panel top padding inline\" id=\"ext-body-density-panel\" style=\"visibility: hidden\">
        <p>Porównaj sylwetkę do <i>Body Density</i> = <b id=\"ext-body-density-output\">45%</b></p>
        <img id=\"ext-body-women\" class=\"rounded border\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("e-dietetyk/images/body-fat-percentage-women.jpg"), "html", null, true);
        echo "\"/>
        <img id=\"ext-body-men\" style=\"display: none\" class=\"rounded border\"
             src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("e-dietetyk/images/body-fat-percentage-men.jpg"), "html", null, true);
        echo "\"/>
    </div>
";
    }

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 20
        echo "    <script src=\"../vendor/ext-4.2.1.883/ext-debug.js\"></script>
    <script src=\"../vendor/kinetic-4.7.4/kinetic-v4.7.4.min.js\"></script>
    <script src=\"../e-dietetyk/js/app.js\"></script>
";
    }

    // line 24
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 25
        echo "    <link rel=\"stylesheet\" href=\"../vendor/ext-4.2.1.883/resources/css/ext-all-neptune.css\"/>
    <link rel=\"stylesheet\" href=\"../e-dietetyk/stylesheets/screen.css\"/>
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 25,  77 => 24,  70 => 20,  64 => 17,  61 => 16,  54 => 13,  49 => 11,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
