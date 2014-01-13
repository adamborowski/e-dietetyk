<?php

/* DietBundle:Default:customers.html.twig */
class __TwigTemplate_79ba628120cbedd4de645cfda77f9acb0e93470de41875f46fe3636fcd995c9a extends Twig_Template
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
        echo "Nasi klienci";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"customer_list\">
    <div>Pan JAKUB, 19 lat</div>
    <div>Pani JULIA, 22 lata</div>
    <div>Pan KACPER, 18 lat</div>
    <div>Pani MAJA, 24 lata</div>
    <div>Pan SZYMON, 20 lat</div>
    <div>Pani ZUZANNA, 31 lat</div>
    <div>Pan MATEUSZ, 27 lat</div>
    <div>Pani WIKTORIA, 18 lat</div>
    <div>Pan FILIP, 20 lat</div>
    <div>Pani OLIWIA, 38 lat</div>
    <div>Pan MICHAŁ, 42 lat</div>
    <div>Pani AMELIA, 20 lat</div>
    <div>Pan BARTOSZ, 19 lat</div>
    <div>Pani NATALIA, 26 lat</div>
    <div>Pan WIKTOR, 23 lat</div>
    <div>Pani ALEKSANDRA, 24 lat</div>
    <div>Pan PIOTR, 30 lat</div>
    <div>Pani LENA, 22 lat</div>
    <div>Pan DAWID, 33 lat</div>
    <div>Pani NIKOLA, 29 lat</div>
    <div>Pan ADAM, 22 lat</div>
    <div>Pani ZOFIA, 38 lat</div>
    <div>Pan MACIEJ, 21 lat</div>
    <div>Pani MARTYNA, 19 lat</div>
    <div>Pan JAN, 34 lat</div>
    <div>Pani WERONIKA, 20 lat</div>
    <div>Pan IGOR, 24 lat</div>
    <div>Pani ANNA, 39 lat</div>
    <div>Pan MIKOŁAJ, 22 lat</div>
    <div>Pani EMILIA, 29 lat</div>
    <div>Pan PATRYK, 22 lat</div>
    <div>Pani MAGDALENA, 21 lat</div>
    <div>Pan PAWEŁ, 27 lat</div>
    <div>Pani HANNA, 35 lat</div>
    <div>Pan DOMINIK, 18 lat</div>
    <div>Pani KAROLINA, 18 lat</div>
    <div>Pan OSKAR, 26 lat</div>
    <div>Pani GABRIELA, 23 lat</div>
    <div>Pan ANTONI, 47 lat</div>
    <div>Pani ALICJA, 37 lat</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:customers.html.twig";
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
