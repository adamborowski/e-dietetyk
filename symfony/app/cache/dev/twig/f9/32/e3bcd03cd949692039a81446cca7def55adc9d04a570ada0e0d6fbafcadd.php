<?php

/* DietBundle:Default:orders.html.twig */
class __TwigTemplate_f932e3bcd03cd949692039a81446cca7def55adc9d04a570ada0e0d6fbafcadd extends Twig_Template
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
        echo "Twoje zamówienia";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    zamówienia
    <br/>
    lista dokonanych zamówień
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:orders.html.twig";
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
