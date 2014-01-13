<?php

/* DietBundle:Default:contact.html.twig */
class __TwigTemplate_bba7980ea1d24f80b746a3859f9dfc8af86efd23ce0de01894f8a591eaa8d910 extends Twig_Template
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
        echo "Kontakt";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    contact
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:contact.html.twig";
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
