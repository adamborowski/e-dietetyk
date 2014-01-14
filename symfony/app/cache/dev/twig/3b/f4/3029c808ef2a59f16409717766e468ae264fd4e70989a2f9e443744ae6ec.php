<?php

/* DietBundle:Default:about.html.twig */
class __TwigTemplate_3bf43029c808ef2a59f16409717766e468ae264fd4e70989a2f9e443744ae6ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DietBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
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
        echo "O nas";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    Serwis Twoja-dieta.eu istnieje od 1999r.
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,);
    }
}
