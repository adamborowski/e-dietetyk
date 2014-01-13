<?php

/* DietBundle:Default:profile.html.twig */
class __TwigTemplate_5c1c67a6ff2f9fb9dcd42da548cc41de8041a2a6f303da012436b1481353b28b extends Twig_Template
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
        echo "Twój profil";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    profil
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
        return array (  38 => 6,  35 => 5,  29 => 3,);
    }
}
