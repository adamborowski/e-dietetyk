<?php

/* DietBundle:Default:diet.html.twig */
class __TwigTemplate_954ce75bb1f0286114b99805e9e022da39b71cf9b748b86066bd3b98bb030770 extends Twig_Template
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
        echo "Twoja dieta";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    dieta
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:diet.html.twig";
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